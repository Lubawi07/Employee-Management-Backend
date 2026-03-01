<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UsersForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('User Info')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Name')
                                    ->required()
                                    ->prefixIcon('heroicon-m-user'),
                                TextInput::make('email')
                                    ->label('Email')
                                    ->required()
                                    ->prefixIcon('heroicon-m-envelope'),
                                TextInput::make('phone_number')
                                    ->label('Nomor Telepon')
                                    ->required()
                                    ->length(12)
                                    ->tel()
                                    ->prefixIcon('heroicon-m-phone'),
                                TextInput::make('password')
                                    ->label('Password')
                                    ->password()
                                    ->required()
                                    ->revealable()
                                    ->prefixIcon('heroicon-m-lock-closed')

                            ])
                    ])
                    ->columnSpanFull()
            ]);
    }
}
