<?php

namespace App\Filament\Karyawan\Resources\SlipGajis;

use App\Filament\Karyawan\Resources\SlipGajis\Pages\ListSlipGajis;
use App\Filament\Karyawan\Resources\SlipGajis\Schemas\SlipGajiForm;
use App\Filament\Karyawan\Resources\SlipGajis\Tables\SlipGajisTable;
use App\Models\Gaji;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SlipGajiResource extends Resource
{
    protected static ?string $model = Gaji::class;

    protected static ?string $navigationLabel = 'Slip Gaji Saya';

    protected static ?string $modelLabel = 'Slip Gaji';

    protected static ?string $pluralModelLabel = 'Slip Gaji Saya';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedDocumentText;

    protected static ?string $recordTitleAttribute = 'id_gaji';

    public static function form(Schema $schema): Schema
    {
        return SlipGajiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SlipGajisTable::configure($table);
    }

    /**
     * Hanya tampilkan data milik karyawan yang login.
     */
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()

            ->whereHas('karyawan', function (Builder $query) {

                $query->where('user_id', auth()->id());

            });
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSlipGajis::route('/'),
        ];
    }
}