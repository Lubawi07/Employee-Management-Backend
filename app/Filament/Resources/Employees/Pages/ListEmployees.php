<?php

namespace App\Filament\Resources\Employees\Pages;

use App\Filament\Resources\Employees\EmployeesResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListEmployees extends ListRecords
{
    protected static string $resource = EmployeesResource::class;
    protected ?string $heading = 'Karyawan';
    protected ?string $subheading = 'Manajemen karyawan';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
