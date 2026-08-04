<?php

namespace App\Filament\Karyawan\Resources\SlipGajis\Pages;

use App\Filament\Karyawan\Resources\SlipGajis\SlipGajiResource;
use Filament\Resources\Pages\ListRecords;

class ListSlipGajis extends ListRecords
{
    protected static string $resource = SlipGajiResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}