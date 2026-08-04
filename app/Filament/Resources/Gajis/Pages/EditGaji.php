<?php

namespace App\Filament\Resources\Gajis\Pages;

use App\Filament\Resources\Gajis\GajiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGaji extends EditRecord
{
    protected static string $resource = GajiResource::class;

    protected function getHeaderActions(): array
    {
        return [

            Actions\Action::make('cetakSlip')
                ->label('Cetak Slip')
                ->icon('heroicon-o-printer')
                ->color('success')
                ->url(fn () => route('slip-gaji', $this->record))
                ->openUrlInNewTab(),

            Actions\DeleteAction::make(),

        ];
    }
}