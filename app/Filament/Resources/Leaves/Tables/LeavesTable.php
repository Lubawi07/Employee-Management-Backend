<?php

namespace App\Filament\Resources\Leaves\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class LeavesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                TextColumn::make('employee.user.name')
                    ->label('Karyawan'),
                TextColumn::make('leave_type')
                    ->label('Tipe Cuti')
                    ->badge(),
                TextColumn::make('start_date')
                    ->label('Mulai Tanggal'),
                TextColumn::make('end_date')
                    ->label('Selesai Tanggal'),
                TextColumn::make('persetujuan')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Disetujui' => 'success',
                        'Pending' => 'info',
                        'Ditolak' => 'warning',
                    }),
                TextColumn::make('user.name')
                    ->label('Disetujui oleh'),
                // TextColumn::make('reason')
                //     ->label('Alasan'),
                TextColumn::make('created_at')
                    ->label('Dibuat')
            ])
            ->filters([
                //
            ])
            ->recordActions([
                DeleteAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
