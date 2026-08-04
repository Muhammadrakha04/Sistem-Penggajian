<?php

namespace App\Filament\Resources\Tunjangans;

use App\Filament\Resources\Tunjangans\Pages\CreateTunjangan;
use App\Filament\Resources\Tunjangans\Pages\EditTunjangan;
use App\Filament\Resources\Tunjangans\Pages\ListTunjangans;
use App\Filament\Resources\Tunjangans\Schemas\TunjanganForm;
use App\Filament\Resources\Tunjangans\Tables\TunjangansTable;
use App\Models\Tunjangan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TunjanganResource extends Resource
{
    protected static ?string $model = Tunjangan::class;

    // Nama menu
    protected static ?string $navigationLabel = 'Data Tunjangan';

    // Nama jamak
    protected static ?string $pluralModelLabel = 'Data Tunjangan';

    // Nama tunggal
    protected static ?string $modelLabel = 'Tunjangan';

    // Group menu
    protected static string|\UnitEnum|null $navigationGroup = 'Master Data';

    // Icon
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBanknotes;

    // Judul record
    protected static ?string $recordTitleAttribute = 'jenis_tunjangan';

    public static function form(Schema $schema): Schema
    {
        return TunjanganForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TunjangansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTunjangans::route('/'),
            'create' => CreateTunjangan::route('/create'),
            'edit' => EditTunjangan::route('/{record}/edit'),
        ];
    }
}