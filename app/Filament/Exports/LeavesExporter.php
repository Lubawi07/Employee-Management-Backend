<?php

namespace App\Filament\Exports;

use App\Models\leaves;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class LeavesExporter extends Exporter
{
    protected static ?string $model = leaves::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('employee.user.name')
                ->label('Karyawan'),
            ExportColumn::make('leave_type')
                ->label('Tipe Cuti'),
            ExportColumn::make('start_date')
                ->label('Mulai Tanggal'),
            ExportColumn::make('end_date')
                ->label('Selesai Tanggal'),
            ExportColumn::make('persetujuan')
                ->label('Status'),
            ExportColumn::make('user.name')
                ->label('Disetujui oleh'),
            ExportColumn::make('reason')
                ->label('Alasan')
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your leaves export has completed and ' . Number::format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
