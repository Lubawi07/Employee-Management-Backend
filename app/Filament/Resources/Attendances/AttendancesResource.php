<?php

namespace App\Filament\Resources\Attendances;

use App\Filament\Resources\Attendances\Pages\CreateAttendances;
use App\Filament\Resources\Attendances\Pages\EditAttendances;
use App\Filament\Resources\Attendances\Pages\ListAttendances;
use App\Filament\Resources\Attendances\Schemas\AttendancesForm;
use App\Filament\Resources\Attendances\Tables\AttendancesTable;
use App\Models\attendances;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;


class AttendancesResource extends Resource
{
    protected static ?string $model = attendances::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::Calendar;
    protected static ?string $navigationLabel = 'Kehadiran';
    protected static string | UnitEnum | null $navigationGroup = 'Absensi';


    public static function form(Schema $schema): Schema
    {
        return AttendancesForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AttendancesTable::configure($table);
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
            'index' => ListAttendances::route('/'),
            'create' => CreateAttendances::route('/create'),
            'edit' => EditAttendances::route('/{record}/edit'),
        ];
    }
}
