<?php

namespace App\Filament\Resources\Tunjangans\Pages;

use App\Filament\Resources\Tunjangans\TunjanganResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTunjangans extends ListRecords
{
    protected static string $resource = TunjanganResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
