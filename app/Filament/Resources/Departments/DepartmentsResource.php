<?php

namespace App\Filament\Resources\Departments;

use App\Filament\Resources\Departments\Pages\CreateDepartments;
use App\Filament\Resources\Departments\Pages\EditDepartments;
use App\Filament\Resources\Departments\Pages\ListDepartments;
use App\Filament\Resources\Departments\Schemas\DepartmentsForm;
use App\Filament\Resources\Departments\Tables\DepartmentsTable;
use App\Models\departments;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class DepartmentsResource extends Resource
{
    protected static ?string $model = departments::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::BuildingOffice2;
    protected static ?int $navigationSort = 3;
    protected static ?string $navigationLabel = 'Departemen';
    protected static string | UnitEnum | null $navigationGroup = 'Employee Management';


    public static function form(Schema $schema): Schema
    {
        return DepartmentsForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DepartmentsTable::configure($table);
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
            'index' => ListDepartments::route('/'),
            'create' => CreateDepartments::route('/create'),
            'edit' => EditDepartments::route('/{record}/edit'),
        ];
    }
}
