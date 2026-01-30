<?php

namespace App\Filament\Resources\Positions;

use App\Filament\Resources\Positions\Pages\CreatePositions;
use App\Filament\Resources\Positions\Pages\EditPositions;
use App\Filament\Resources\Positions\Pages\ListPositions;
use App\Filament\Resources\Positions\Schemas\PositionsForm;
use App\Filament\Resources\Positions\Tables\PositionsTable;
use App\Models\positions;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class PositionsResource extends Resource
{
    protected static ?string $model = positions::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Briefcase;
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Posisi';
    protected static string | UnitEnum | null $navigationGroup = 'Employee Management';


    public static function form(Schema $schema): Schema
    {
        return PositionsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PositionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPositions::route('/'),
            'create' => CreatePositions::route('/create'),
            'edit' => EditPositions::route('/{record}/edit'),
        ];
    }
}
