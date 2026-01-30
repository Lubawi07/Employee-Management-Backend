<?php

namespace App\Filament\Resources\Employees\Pages;

use App\Filament\Resources\Employees\EmployeesResource;
use Filament\Resources\Pages\CreateRecord;

class CreateEmployees extends CreateRecord
{
    protected static string $resource = EmployeesResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
