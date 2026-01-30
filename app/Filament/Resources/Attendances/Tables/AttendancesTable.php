<?php

namespace App\Filament\Resources\Attendances\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AttendancesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->rowIndex(),
                // Employee_id
                TextColumn::make('employee.user.name')
                    ->label('Karyawan'),
                TextColumn::make('attendance_date')
                    ->label('Tanggal Masuk'),
                TextColumn::make('check_in')
                    ->label('Check In'),
                TextColumn::make('check_out')
                    ->label('Check Out'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Hadir' => 'success',
                        'Telat' => 'warning',
                        'Izin' => 'info',
                        'Alpa' => 'danger',
                    }),
                TextColumn::make('created_at')
                    ->label('Dibuat'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
