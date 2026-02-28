<?php

namespace App\Filament\Resources\Attendances\Tables;

use App\Filament\Exports\AttendancesExporter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ExportAction;
use Filament\Actions\ExportBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class AttendancesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->headerActions([
                ExportAction::make()
                    ->exporter(AttendancesExporter::class)
                    ->label('Export Kehadiran')
            ])
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->rowIndex()
                    ->sortable(),
                // Employee_id
                TextColumn::make('employee.user.name')
                    ->label('Karyawan')
                    ->searchable(),
                TextColumn::make('attendance_date')
                    ->label('Tanggal Masuk'),
                TextColumn::make('check_in')
                    ->label('Masuk Jam'),
                TextColumn::make('check_out')
                    ->label('Keluar Jam'),
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
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'Hadir' => 'PRESENT',
                        'Telat' => 'LATE',
                        'Izin' => 'ON_LEAVE',
                        'Alpa' => 'ABSENT'
                    ])
                    ->native(false)
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ExportBulkAction::make()
                        ->exporter(AttendancesExporter::class),
                ]),
            ]);
    }
}
