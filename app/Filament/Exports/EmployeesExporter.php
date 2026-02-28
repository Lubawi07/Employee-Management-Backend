<?php

namespace App\Filament\Exports;

use App\Models\employees;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Support\Number;

class EmployeesExporter extends Exporter
{
    protected static ?string $model = employees::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')
                ->label('ID'),
            ExportColumn::make('user.name')
                ->label('Karyawan'),
            ExportColumn::make('gender')
                ->label('Jenis Kelamin'),
            ExportColumn::make('position.name')
                ->label('Posisi'),
            ExportColumn::make('department.name')
                ->label('Departemen'),
            ExportColumn::make('join_date')
                ->label('Tanggal bergabung'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your employees export has completed and ' . Number::format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . Number::format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
