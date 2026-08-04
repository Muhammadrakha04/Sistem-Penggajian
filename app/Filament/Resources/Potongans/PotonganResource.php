<?php

namespace App\Filament\Resources\Potongans;

use App\Filament\Resources\Potongans\Pages\CreatePotongan;
use App\Filament\Resources\Potongans\Pages\EditPotongan;
use App\Filament\Resources\Potongans\Pages\ListPotongans;
use App\Filament\Resources\Potongans\Schemas\PotonganForm;
use App\Filament\Resources\Potongans\Tables\PotongansTable;
use App\Models\Potongan;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class PotonganResource extends Resource
{
    protected static ?string $model = Potongan::class;

    // Nama menu
    protected static ?string $navigationLabel = 'Data Potongan';

    // Nama jamak
    protected static ?string $pluralModelLabel = 'Data Potongan';

    // Nama tunggal
    protected static ?string $modelLabel = 'Potongan';

    // Group menu
    protected static string|\UnitEnum|null $navigationGroup = 'Master Data';

    // Icon
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMinusCircle;

    // Judul record
    protected static ?string $recordTitleAttribute = 'jenis_potongan';

    public static function form(Schema $schema): Schema
    {
        return PotonganForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PotongansTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPotongans::route('/'),
            'create' => CreatePotongan::route('/create'),
            'edit' => EditPotongan::route('/{record}/edit'),
        ];
    }
}