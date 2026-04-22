<?php

namespace App\Filament\Resources\GuruResource\Pages;

use App\Filament\Resources\GuruResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateGuru extends CreateRecord
{
    protected static string $resource = GuruResource::class;

    protected static bool $canCreateAnother = false;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    public function getSavedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Guru Diupdate')
            ->body('Guru berhasil diupdate')
            ->success()
            ->send();
    }
}
