<?php

namespace App\Filament\Resources\Leaves\Tables;

use App\Filament\Exports\LeavesExporter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ExportAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class LeavesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->headerActions([
                ExportAction::make()
                    ->exporter(LeavesExporter::class)
                    ->label('Export Cuti/izin')
            ])
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->rowIndex(),
                TextColumn::make('employee.user.name')
                    ->label('Karyawan')
                    ->searchable(),
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
                TextColumn::make('reason')
                    ->label('Alasan')
                    ->toggleable(true),
                TextColumn::make('created_at')
                    ->label('Dibuat')
            ])
            ->filters([
                SelectFilter::make('leave_type')
                    ->label('Tipe Cuti')
                    ->multiple()
                    ->options([
                        'Sakit' => 'SICK',
                        'Izin' => 'PERMISSIONS',
                        'Penting' => 'EMERGANCY'
                    ]),
                SelectFilter::make('persetujuan')
                    ->label('Status')
                    ->multiple()
                    ->options([
                        'Disetujui' => 'APPROVED',
                        'Ditolak' => 'REJECTED'
                    ])
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
