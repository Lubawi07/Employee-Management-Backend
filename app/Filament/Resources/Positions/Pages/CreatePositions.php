<?php

namespace App\Filament\Resources\Positions\Pages;

use App\Filament\Resources\Positions\PositionsResource;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;

class CreatePositions extends CreateRecord
{
    protected static string $resource = PositionsResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            ->title('Posisi dibuat')
            ->body('Posisi telah berhasil dibuat');
    }

    protected function afterCreate(): void
    {
        // Runs after the form fields are saved to the database.
        Notification::make()
            ->success()
            ->title('Posisi dibuat')
            ->body('Posisi telah berhasil dibuat')
            ->sendToDatabase(auth()->user());
    }
}
