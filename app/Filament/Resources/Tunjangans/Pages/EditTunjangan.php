<?php

namespace App\Filament\Resources\Tunjangans\Pages;

use App\Filament\Resources\Tunjangans\TunjanganResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTunjangan extends EditRecord
{
    protected static string $resource = TunjanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
