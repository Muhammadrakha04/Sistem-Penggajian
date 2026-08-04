<?php

namespace App\Filament\Karyawan\Resources\SlipGajis\Pages;

use App\Filament\Karyawan\Resources\SlipGajis\SlipGajiResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSlipGaji extends EditRecord
{
    protected static string $resource = SlipGajiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
