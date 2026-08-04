<?php

namespace App\Filament\Widgets;

use App\Models\Gaji;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class LaporanGajiStats extends StatsOverviewWidget
{
    protected static bool $isDiscovered = false;

    protected function getStats(): array
    {
        return [

            Stat::make(
                'Total Gaji Bersih',
                'Rp ' . number_format(Gaji::sum('gaji_bersih'), 0, ',', '.')
            ),

            Stat::make(
                'Total Tunjangan',
                'Rp ' . number_format(Gaji::sum('total_tunjangan'), 0, ',', '.')
            ),

            Stat::make(
                'Total Potongan',
                'Rp ' . number_format(Gaji::sum('total_potongan'), 0, ',', '.')
            ),

            Stat::make(
                'Jumlah Slip Gaji',
                Gaji::count()
            ),

        ];
    }
}