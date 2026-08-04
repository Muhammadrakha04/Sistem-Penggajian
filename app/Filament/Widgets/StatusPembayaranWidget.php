<?php

namespace App\Filament\Widgets;

use App\Models\Gaji;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatusPembayaranWidget extends StatsOverviewWidget
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

        $belumDibayar = (clone $baseQuery)->where('status_pembayaran', 'Belum Dibayar')->count();
        $dibayar = (clone $baseQuery)->where('status_pembayaran', 'Dibayar')->count();
        $ditolak = (clone $baseQuery)->where('status_pembayaran', 'Ditolak')->count();

        $totalBelumDibayar = (clone $baseQuery)->where('status_pembayaran', 'Belum Dibayar')->sum('gaji_bersih');
        $totalDibayar = (clone $baseQuery)->where('status_pembayaran', 'Dibayar')->sum('gaji_bersih');

        return [
            Stat::make('Belum Dibayar', $belumDibayar . ' slip')
                ->description('Rp ' . number_format($totalBelumDibayar, 0, ',', '.'))
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),

            Stat::make('Sudah Dibayar', $dibayar . ' slip')
                ->description('Rp ' . number_format($totalDibayar, 0, ',', '.'))
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),

            Stat::make('Ditolak', $ditolak . ' slip')
                ->description('Perlu ditinjau ulang')
                ->descriptionIcon('heroicon-m-x-circle')
                ->color('danger'),
        ];
    }
}