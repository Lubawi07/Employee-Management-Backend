<?php

namespace App\Filament\Resources\Leaves\Schemas;

use App\Enums\Leaves;
use App\Enums\Status;
use App\Models\employees;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class LeavesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('employee_id')
                    ->label('Karyawan')
                    ->options(
                        employees::query()
                        ->with('user')
                        ->get()
                        ->pluck('user.name', 'id')
                    )
                    ->searchPrompt('Pilih karyawan')
                    ->searchable()
                    ->native(false)
                    ->required(),
                Select::make('leave_type')
                    ->label('Tipe izin')
                    ->options(Leaves::class)
                    ->native(false)
                    ->required(),
                DateTimePicker::make('start_date')
                    ->label('Dimulai tanggal')
                    ->default(now())
                    ->required(),
                DateTimePicker::make('end_date')
                    ->label('Selesai tanggal')
                    ->default(now())
                    ->required(),
                Select::make('persetujuan')
                    ->label('Status')
                    ->options(Status::class)
                    ->native(false)
                    ->required(),
                Select::make('approve_by')
                    ->label('Disetujui oleh')
                    ->relationship(name: 'user', titleAttribute: 'name')
                    ->native(false)
                    ->required(),
                RichEditor::make('reason')
                    ->label('Alasan')
                    ->required()
            ]);
    }
}
