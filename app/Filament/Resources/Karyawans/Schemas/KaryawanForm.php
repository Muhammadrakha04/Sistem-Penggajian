<?php

namespace App\Filament\Resources\Karyawans\Schemas;

use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class KaryawanForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Data Karyawan')
                    ->columns(2)
                    ->schema([

                        TextInput::make('nip')
                            ->label('NIP')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(20),

                        TextInput::make('nama')
                            ->label('Nama Karyawan')
                            ->required()
                            ->maxLength(100),

                        Select::make('user_id')
                            ->label('Akun Login')
                            ->relationship(
                                name: 'user',
                                titleAttribute: 'email',
                            )
                            ->searchable()
                            ->preload()
                            ->nullable()
                            ->helperText('Pilih akun login milik karyawan'),

                        TextInput::make('jabatan')
                            ->label('Jabatan')
                            ->required()
                            ->maxLength(50),

                        TextInput::make('departemen')
                            ->label('Departemen')
                            ->required()
                            ->maxLength(50),

                        TextInput::make('gaji_pokok')
                            ->label('Gaji Pokok')
                            ->numeric()
                            ->prefix('Rp')
                            ->required(),

                        DatePicker::make('tanggal_masuk')
                            ->label('Tanggal Masuk')
                            ->required(),

                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'Aktif' => 'Aktif',
                                'Cuti' => 'Cuti',
                                'Resign' => 'Resign',
                            ])
                            ->default('Aktif')
                            ->required(),

                        TextInput::make('no_rekening')
                            ->label('No. Rekening')
                            ->maxLength(30),

                        Textarea::make('alamat')
                            ->label('Alamat')
                            ->rows(3)
                            ->columnSpanFull(),

                    ]),

            ]);
    }
}