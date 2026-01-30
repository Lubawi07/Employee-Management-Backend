<?php

namespace App\Filament\Resources\Attendances\Schemas;

use App\Enums\Attendances;
use App\Models\employees;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class AttendancesForm
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
                DatePicker::make('attendance_date')
                    ->label('Tanggal Masuk')
                    ->default(now())
                    ->required(),
                DateTimePicker::make('check_in')
                    ->label('Check In')
                    ->required(),
                DateTimePicker::make('check_out')
                    ->label('Check Out')
                    ->required(),
                Select::make('status')
                    ->label('Status')
                    ->native(false)
                    ->options(Attendances::class)
                    ->required()
            ]);
    }
}
