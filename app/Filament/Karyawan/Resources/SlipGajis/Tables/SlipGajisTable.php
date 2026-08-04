<?php

namespace App\Filament\Karyawan\Resources\SlipGajis\Tables;

use Filament\Actions\Action;
use Filament\Tables;
use Filament\Tables\Table;

class SlipGajisTable
{
    public static function configure(Table $table): Table
    {
        return $table

            ->columns([

                Tables\Columns\TextColumn::make('bulan')
                    ->label('Bulan')
                    ->formatStateUsing(fn ($state) => [
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
                    ][$state] ?? $state),

                Tables\Columns\TextColumn::make('tahun')
                    ->label('Tahun'),

                Tables\Columns\TextColumn::make('karyawan.nama')
                    ->label('Nama'),

                Tables\Columns\TextColumn::make('total_tunjangan')
                    ->label('Tunjangan')
                    ->money('IDR'),

                Tables\Columns\TextColumn::make('total_potongan')
                    ->label('Potongan')
                    ->money('IDR'),

                Tables\Columns\TextColumn::make('gaji_bersih')
                    ->label('Gaji Bersih')
                    ->money('IDR')
                    ->weight('bold'),

                Tables\Columns\BadgeColumn::make('status_pembayaran')
                    ->label('Status')
                    ->colors([
                        'warning' => 'Belum Dibayar',
                        'success' => 'Sudah Dibayar',
                    ]),
            ])

            ->defaultSort('tahun', 'desc')
            ->defaultSort('bulan', 'desc')

            ->filters([

            ])

            ->recordActions([

                Action::make('cetak')

                    ->label('Cetak')

                    ->icon('heroicon-o-printer')

                    ->color('success')

                    ->url(fn ($record) => route('slip-gaji', $record))

                    ->openUrlInNewTab(),

            ])

            ->toolbarActions([
                //
            ]);
    }
}