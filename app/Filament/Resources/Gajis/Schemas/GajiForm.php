<?php

namespace App\Filament\Resources\Gajis\Schemas;

use App\Models\Karyawan;
use App\Models\Potongan;
use App\Models\Tunjangan;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GajiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Proses Penggajian')
                    ->columns(2)
                    ->schema([

                        Select::make('id_karyawan')
                            ->label('Karyawan')
                            ->relationship('karyawan', 'nama')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('bulan')
                            ->label('Bulan')
                            ->options([
                                1 => 'Januari',
                                2 => 'Februari',
                                3 => 'Maret',
                                4 => 'April',
                                5 => 'Mei',
                                6 => 'Juni',
                                7 => 'Juli',
                                8 => 'Agustus',
                                9 => 'September',
                                10 => 'Oktober',
                                11 => 'November',
                                12 => 'Desember',
                            ])
                            ->required(),

                        TextInput::make('tahun')
                            ->label('Tahun')
                            ->numeric()
                            ->default(date('Y'))
                            ->required(),

                        Select::make('status_pembayaran')
                            ->label('Status Pembayaran')
                            ->options([
                                'Belum Dibayar' => 'Belum Dibayar',
                                'Dibayar' => 'Dibayar',
                                'Ditolak' => 'Ditolak',
                            ])
                            ->default('Belum Dibayar')
                            ->required(),
                    ]),

                Section::make('Hasil Perhitungan')
                    ->columns(2)
                    ->schema([

                        TextInput::make('gaji_pokok')
                            ->label('Gaji Pokok')
                            ->prefix('Rp')
                            ->disabled()
                            ->dehydrated(false),

                        TextInput::make('total_tunjangan')
                            ->label('Total Tunjangan')
                            ->prefix('Rp')
                            ->numeric()
                            ->disabled(),

                        TextInput::make('total_potongan')
                            ->label('Total Potongan')
                            ->prefix('Rp')
                            ->numeric()
                            ->disabled(),

                        TextInput::make('gaji_bersih')
                            ->label('Gaji Bersih')
                            ->prefix('Rp')
                            ->numeric()
                            ->disabled(),
                    ]),
            ]);
    }
}