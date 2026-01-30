<?php

namespace App\Filament\Resources\Positions\Schemas;

use App\Models\departments;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PositionsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nama')
                    ->required(),
                Select::make('department_id')
                    ->label('Departemen')
                    ->options(departments::query()->pluck('name', 'id'))
                    ->searchable()
                    ->native(false)
                    ->required()
            ]);
    }
}
