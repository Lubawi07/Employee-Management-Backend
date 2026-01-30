<?php

namespace App\Filament\Resources\Employees\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EmployeesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('Karyawan')
                    ->searchable(),
                TextColumn::make('gender')
                    ->label('Jenis kelamin')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Laki-laki' => 'info',
                        'Perempuan' => 'danger',
                    }),
                TextColumn::make('position.name')
                    ->label('Posisi'),
                TextColumn::make('department.name')
                    ->label('Departemen'),
                TextColumn::make('join_date')
                    ->label('Tanggal bergabung')
                    ->date()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label('Dibuat'),
                TextColumn::make('updated_at')
                    ->label('Diupdate')
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
