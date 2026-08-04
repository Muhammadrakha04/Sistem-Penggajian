<?php

namespace App\Filament\Resources\Gajis\Pages;

use App\Exports\GajiExport;
use App\Filament\Resources\Gajis\GajiResource;
use App\Filament\Widgets\LaporanGajiStats;
use App\Models\Gaji;
use App\Models\Karyawan;
use App\Models\Potongan;
use App\Models\Tunjangan;
use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class ListGajis extends ListRecords
{
    protected static string $resource = GajiResource::class;

    protected function getHeaderWidgets(): array
    {
        return [
            LaporanGajiStats::class,
        ];
    }

    protected function getHeaderActions(): array
    {
        return [

            Action::make('exportExcel')
                ->label('Export Excel')
                ->icon('heroicon-o-arrow-down-tray')
                ->color('info')
                ->action(function () {
                    return Excel::download(
                        new GajiExport(),
                        'laporan_penggajian.xlsx'
                    );
                }),

            Action::make('exportPdf')
    ->label('Export PDF')
    ->icon('heroicon-o-document-arrow-down')
    ->color('danger')

    ->form([

        Select::make('bulan')
            ->label('Bulan')
            ->options([
                1 => 'Januari',
                2 => 'Februari',
                3 => 'Maret',
                4 => 'April',
                5 => 'Mei',
                6 => 'Juni',
                7 => 'Juli',
                8 => 'Agustus',
                9 => 'September',
                10 => 'Oktober',
                11 => 'November',
                12 => 'Desember',
            ])
            ->required(),

        TextInput::make('tahun')
            ->label('Tahun')
            ->numeric()
            ->default(date('Y'))
            ->required(),

    ])

    ->action(function (array $data) {

        $bulanNama = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        $gajis = Gaji::with('karyawan')
            ->where('bulan', $data['bulan'])
            ->where('tahun', $data['tahun'])
            ->orderBy('id_karyawan')
            ->get();

        $pdf = Pdf::loadView('pdf.laporan-gaji', [
            'gajis' => $gajis,
            'bulan' => $bulanNama[$data['bulan']],
            'tahun' => $data['tahun'],
        ]);

        $pdf->setPaper('A4', 'landscape');

        return response()->streamDownload(
            fn () => print($pdf->output()),
            "Laporan_Gaji_{$data['bulan']}_{$data['tahun']}.pdf"
        );

    }),

            Action::make('prosesGaji')
                ->label('Proses Gaji')
                ->icon('heroicon-o-banknotes')
                ->color('success')
                ->requiresConfirmation()
                ->modalHeading('Proses Penggajian')
                ->modalDescription('Pilih bulan dan tahun yang akan diproses. Jika data sudah ada, sistem akan menghitung ulang.')
                ->modalSubmitActionLabel('Proses')

                ->form([

                    Select::make('bulan')
                        ->label('Bulan')
                        ->options([
                            1 => 'Januari',
                            2 => 'Februari',
                            3 => 'Maret',
                            4 => 'April',
                            5 => 'Mei',
                            6 => 'Juni',
                            7 => 'Juli',
                            8 => 'Agustus',
                            9 => 'September',
                            10 => 'Oktober',
                            11 => 'November',
                            12 => 'Desember',
                        ])
                        ->required(),

                    TextInput::make('tahun')
                        ->label('Tahun')
                        ->numeric()
                        ->default(date('Y'))
                        ->required(),

                ])

                ->action(function (array $data) {

                    $jumlahDiproses = 0;

                    DB::transaction(function () use ($data, &$jumlahDiproses) {

                        Gaji::where('bulan', $data['bulan'])
                            ->where('tahun', $data['tahun'])
                            ->delete();

                        $karyawans = Karyawan::where('status', 'Aktif')->get();

                        foreach ($karyawans as $karyawan) {

                            $totalTunjangan = Tunjangan::where('id_karyawan', $karyawan->id_karyawan)
                                ->where('bulan', $data['bulan'])
                                ->where('tahun', $data['tahun'])
                                ->sum('nominal');

                            $totalPotongan = Potongan::where('id_karyawan', $karyawan->id_karyawan)
                                ->where('bulan', $data['bulan'])
                                ->where('tahun', $data['tahun'])
                                ->sum('nominal');

                            $gajiBersih =
                                $karyawan->gaji_pokok +
                                $totalTunjangan -
                                $totalPotongan;

                            Gaji::create([
                                'id_karyawan' => $karyawan->id_karyawan,
                                'bulan' => $data['bulan'],
                                'tahun' => $data['tahun'],
                                'total_tunjangan' => $totalTunjangan,
                                'total_potongan' => $totalPotongan,
                                'gaji_bersih' => $gajiBersih,
                                'tanggal_proses' => Carbon::now(),
                                'status_pembayaran' => 'Belum Dibayar',
                            ]);

                            $jumlahDiproses++;
                        }
                    });

                    Notification::make()
                        ->title('Proses Penggajian Berhasil')
                        ->body("{$jumlahDiproses} data gaji berhasil diproses.")
                        ->success()
                        ->send();
                }),

        ];
    }
}