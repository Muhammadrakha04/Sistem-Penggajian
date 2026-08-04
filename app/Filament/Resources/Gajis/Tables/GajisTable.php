<?php

namespace App\Filament\Resources\Gajis\Tables;

use Filament\Actions\Action;
use App\Models\Gaji;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables;
use Filament\Tables\Table;

class GajisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->defaultSort('tanggal_proses', 'desc')

            ->columns([
                Tables\Columns\TextColumn::make('karyawan.nip')
                    ->label('NIP')
                    ->searchable(),

                Tables\Columns\TextColumn::make('karyawan.nama')
                    ->label('Nama Karyawan')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('bulan')
                    ->label('Bulan')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match ((int) $state) {
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
                        default => '-',
                    }),

                Tables\Columns\TextColumn::make('tahun')
                    ->sortable(),

                Tables\Columns\TextColumn::make('karyawan.gaji_pokok')
                    ->label('Gaji Pokok')
                    ->money('IDR')
                    ->sortable(),

                Tables\Columns\TextColumn::make('total_tunjangan')
                    ->label('Total Tunjangan')
                    ->money('IDR')
                    ->sortable(),

                Tables\Columns\TextColumn::make('total_potongan')
                    ->label('Total Potongan')
                    ->money('IDR')
                    ->sortable(),

                Tables\Columns\TextColumn::make('gaji_bersih')
                    ->label('Gaji Bersih')
                    ->money('IDR')
                    ->sortable(),

                Tables\Columns\TextColumn::make('status_pembayaran')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state) => match ($state) {
                        'Belum Dibayar' => 'warning',
                        'Dibayar' => 'success',
                        'Ditolak' => 'danger',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('tanggal_proses')
                    ->label('Tanggal Proses')
                    ->date('d M Y')
                    ->sortable(),
            ])

            ->filters([
                Tables\Filters\SelectFilter::make('bulan')
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
                    ]),

                Tables\Filters\SelectFilter::make('tahun')
                    ->options(
                        Gaji::query()
                            ->distinct()
                            ->orderByDesc('tahun')
                            ->pluck('tahun', 'tahun')
                            ->toArray()
                    ),

                Tables\Filters\SelectFilter::make('status_pembayaran')
                    ->options([
                        'Belum Dibayar' => 'Belum Dibayar',
                        'Dibayar' => 'Dibayar',
                        'Ditolak' => 'Ditolak',
                    ]),
            ])

            ->recordActions([

    EditAction::make(),

    Action::make('cetakSlip')
        ->label('Cetak Slip')
        ->icon('heroicon-o-printer')
        ->color('success')
        ->url(fn ($record) => route('slip-gaji', $record))
        ->openUrlInNewTab(),

])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}