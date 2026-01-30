<?php

namespace App\Filament\Resources\Attendances\Pages;

use App\Filament\Resources\Attendances\AttendancesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAttendances extends ListRecords
{
    protected static string $resource = AttendancesResource::class;
    protected ?string $heading = 'Kehadiran';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
