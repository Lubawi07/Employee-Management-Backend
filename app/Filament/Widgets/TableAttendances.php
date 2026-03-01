<?php

namespace App\Filament\Widgets;

use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use App\Models\attendances;

class TableAttendances extends TableWidget
{
    protected static ?string $heading = 'Kehadiran hari ini';
    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => attendances::query())
            ->paginated([5])
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->rowIndex()
                    ->sortable(),
                // Employee_id
                TextColumn::make('employee.user.name')
                    ->label('Karyawan'),
                TextColumn::make('attendance_date')
                    ->label('Tanggal Masuk'),
                TextColumn::make('check_in')
                    ->label('Check In'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Hadir' => 'success',
                        'Telat' => 'warning',
                        'Izin' => 'info',
                        'Alpa' => 'danger',
                    }),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->recordActions([
                //
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    //
                ]),
            ]);
    }
}
