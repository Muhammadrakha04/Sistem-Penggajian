<?php

namespace App\Filament\Widgets;

use App\Models\Gaji;
use Filament\Widgets\ChartWidget;
use Filament\Widgets\Concerns\InteractsWithPageFilters;
use Illuminate\Contracts\Support\Htmlable;

class PengeluaranGajiChart extends ChartWidget
{
    use InteractsWithPageFilters;

    protected int|string|array $columnSpan = 'full';

    public function getHeading(): string|Htmlable|null
    {
        $tahun = $this->pageFilters['tahun'] ?? null;
        $tahun = filled($tahun) ? (int) $tahun : null;

        return $tahun
            ? "Grafik Pengeluaran Gaji per Bulan ({$tahun})"
            : 'Grafik Pengeluaran Gaji per Bulan (Seluruh Tahun)';
    }

    protected function getData(): array
    {
        $tahun = $this->pageFilters['tahun'] ?? null;
        $tahun = filled($tahun) ? (int) $tahun : null;

        $bulan = [
            1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr',
            5 => 'Mei', 6 => 'Jun', 7 => 'Jul', 8 => 'Agu',
            9 => 'Sep', 10 => 'Okt', 11 => 'Nov', 12 => 'Des',
        ];

        $data = [];

        foreach ($bulan as $index => $namaBulan) {
            $data[] = Gaji::query()
                ->where('bulan', $index)
                ->when($tahun, fn ($query) => $query->where('tahun', $tahun))
                ->sum('gaji_bersih');
        }

        return [
            'datasets' => [
                [
                    'label' => 'Pengeluaran Gaji',
                    'data' => $data,
                    'fill' => false,
                    'tension' => 0.3,
                ],
            ],

            'labels' => array_values($bulan),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}