<?php

namespace App\Filament\Widgets;

use App\Models\Gaji;
use App\Models\Karyawan;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends StatsOverviewWidget
{
    use InteractsWithPageFilters;

    protected function getStats(): array
    {
        $bulan = $this->pageFilters['bulan'] ?? null;
        $tahun = $this->pageFilters['tahun'] ?? null;

        $bulan = filled($bulan) ? (int) $bulan : null;
        $tahun = filled($tahun) ? (int) $tahun : null;

        $baseQuery = Gaji::query()
            ->when($bulan, fn ($query) => $query->where('bulan', $bulan))
            ->when($tahun, fn ($query) => $query->where('tahun', $tahun));

        $totalKaryawan = Karyawan::count();
        $totalGaji = (clone $baseQuery)->sum('gaji_bersih');
        $totalTunjangan = (clone $baseQuery)->sum('total_tunjangan');
        $totalPotongan = (clone $baseQuery)->sum('total_potongan');

        $periodeLabel = $this->getPeriodeLabel($bulan, $tahun);

        return [
            Stat::make('Total Karyawan', number_format($totalKaryawan))
                ->description('Jumlah seluruh karyawan')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary'),

            Stat::make(
                'Total Penggajian',
                'Rp ' . number_format($totalGaji, 0, ',', '.')
            )
                ->description($periodeLabel)
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('success'),

            Stat::make(
                'Total Tunjangan',
                'Rp ' . number_format($totalTunjangan, 0, ',', '.')
            )
                ->description($periodeLabel)
                ->descriptionIcon('heroicon-m-gift')
                ->color('info'),

            Stat::make(
                'Total Potongan',
                'Rp ' . number_format($totalPotongan, 0, ',', '.')
            )
                ->description($periodeLabel)
                ->descriptionIcon('heroicon-m-minus-circle')
                ->color('danger'),
        ];
    }

    protected function getPeriodeLabel(?int $bulan, ?int $tahun): string
    {
        $namaBulan = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember',
        ];

        return match (true) {
            $bulan && $tahun => "Periode {$namaBulan[$bulan]} {$tahun}",
            (bool) $tahun => "Periode Tahun {$tahun}",
            (bool) $bulan => "Periode {$namaBulan[$bulan]} (semua tahun)",
            default => 'Seluruh periode',
        };
    }
}