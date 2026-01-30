<?php

namespace App\Filament\Resources\Positions\Pages;

use App\Filament\Resources\Positions\PositionsResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListPositions extends ListRecords
{
    protected static string $resource = PositionsResource::class;
    protected ?string $heading = 'Posisi';

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
