<?php

namespace App\Filament\Resources\Employees;

use App\Filament\Resources\Employees\Pages\CreateEmployees;
use App\Filament\Resources\Employees\Pages\EditEmployees;
use App\Filament\Resources\Employees\Pages\ListEmployees;
use App\Filament\Resources\Employees\Schemas\EmployeesForm;
use App\Filament\Resources\Employees\Tables\EmployeesTable;
use App\Models\employees;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Support\Htmlable;
use UnitEnum;

class EmployeesResource extends Resource
{
    protected static ?string $model = employees::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Identification;
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationLabel = 'Karyawan';
    protected static string|UnitEnum|null $navigationGroup = 'Employee Management';

    public static function getGlobalSearchResultTitle(Model $record): string|Htmlable
    {
        return $record->user->name;
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['user.name', 'position.name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Posisi' => $record->position->name
        ];
    }


    public static function form(Schema $schema): Schema
    {
        return EmployeesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EmployeesTable::configure($table);
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
            'index' => ListEmployees::route('/'),
            'create' => CreateEmployees::route('/create'),
            'edit' => EditEmployees::route('/{record}/edit'),
        ];
    }
}
