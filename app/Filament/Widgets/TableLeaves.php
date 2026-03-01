<?php

namespace App\Filament\Widgets;

use Filament\Actions\BulkActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;
use App\Models\leaves;

class TableLeaves extends TableWidget
{
    protected static ?string $heading = 'Cuti/izin hari ini';
    // protected int | string | array $columnSpan = 'full';
    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => leaves::query())
            ->paginated([5])
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->rowIndex(),
                TextColumn::make('employee.user.name')
                    ->label('Karyawan'),
                TextColumn::make('leave_type')
                    ->label('Tipe Cuti')
                    ->badge(),
                TextColumn::make('start_date')
                    ->label('Mulai Tanggal'),
                TextColumn::make('persetujuan')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'Disetujui' => 'success',
                        'Pending' => 'info',
                        'Ditolak' => 'warning',
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
