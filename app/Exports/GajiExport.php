<?php

namespace App\Exports;

use App\Models\Gaji;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class GajiExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    public function collection()
    {
        return Gaji::with('karyawan')
            ->get()
            ->map(function ($gaji, $index) {

                return [
                    'No' => $index + 1,
                    'NIP' => $gaji->karyawan->nip,
                    'Nama Karyawan' => $gaji->karyawan->nama,
                    'Jabatan' => $gaji->karyawan->jabatan,
                    'Departemen' => $gaji->karyawan->departemen,
                    'Bulan' => $this->namaBulan($gaji->bulan),
                    'Tahun' => $gaji->tahun,
                    'Gaji Pokok' => $gaji->karyawan->gaji_pokok,
                    'Total Tunjangan' => $gaji->total_tunjangan,
                    'Total Potongan' => $gaji->total_potongan,
                    'Gaji Bersih' => $gaji->gaji_bersih,
                    'Status Pembayaran' => $gaji->status_pembayaran,
                    'Tanggal Proses' => $gaji->tanggal_proses,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'No',
            'NIP',
            'Nama Karyawan',
            'Jabatan',
            'Departemen',
            'Bulan',
            'Tahun',
            'Gaji Pokok',
            'Total Tunjangan',
            'Total Potongan',
            'Gaji Bersih',
            'Status Pembayaran',
            'Tanggal Proses',
        ];
    }

    private function namaBulan($bulan): string
    {
        return match ((int) $bulan) {
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
            default => '-',
        };
    }
}