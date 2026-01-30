<?php

namespace App\Filament\Resources\Employees\Schemas;

use App\Enums\Gender;
use App\Models\departments;
use App\Models\positions;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class EmployeesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Karyawan')
                    ->description('Data utama karyawan dalam perusahaan')
                    ->schema([
                        Select::make('user_id')
                            ->label('Nama Karyawan')
                            ->options(User::query()->pluck('name', 'id'))
                            ->native(false)
                            ->searchable()
                            ->required(),

                        Select::make('gender')
                            ->label('Jenis Kelamin')
                            ->options(Gender::class)
                            ->native(false)
                            ->required(),
                    ]),

                Section::make('Posisi & Departemen')
                    ->description('Struktur organisasi karyawan')
                    ->schema([
                        Select::make('position_id')
                            ->label('Posisi')
                            ->options(positions::query()->pluck('name', 'id'))
                            ->native(false)
                            ->searchable()
                            ->required(),

                        Select::make('department_id')
                            ->label('Departemen')
                            ->options(departments::query()->pluck('name', 'id'))
                            ->native(false)
                            ->searchable()
                            ->required(),
                    ])
                    ->columns(2),

                Section::make('Informasi Kepegawaian')
                    ->schema([
                        DatePicker::make('join_date')
                            ->label('Bergabung tanggal')
                            ->default(now())
                            ->required()
                    ]),
            ]);
    }
}
