<?php

namespace App\Filament\Resources\Gajis;

use App\Filament\Resources\Gajis\Pages\CreateGaji;
use App\Filament\Resources\Gajis\Pages\EditGaji;
use App\Filament\Resources\Gajis\Pages\ListGajis;
use App\Filament\Resources\Gajis\Schemas\GajiForm;
use App\Filament\Resources\Gajis\Tables\GajisTable;
use App\Models\Gaji;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GajiResource extends Resource
{
    protected static ?string $model = Gaji::class;

    // Nama menu di sidebar
    protected static ?string $navigationLabel = 'Data Gaji';

    // Nama jamak
    protected static ?string $pluralModelLabel = 'Data Gaji';

    // Nama tunggal
    protected static ?string $modelLabel = 'Gaji';

    // Group menu
    protected static string|\UnitEnum|null $navigationGroup = 'Transaksi';

    // Icon
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBanknotes;

    // Judul record
    protected static ?string $recordTitleAttribute = 'id_gaji';

    public static function form(Schema $schema): Schema
    {
        return GajiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GajisTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListGajis::route('/'),
            'create' => CreateGaji::route('/create'),
            'edit' => EditGaji::route('/{record}/edit'),
        ];
    }
}