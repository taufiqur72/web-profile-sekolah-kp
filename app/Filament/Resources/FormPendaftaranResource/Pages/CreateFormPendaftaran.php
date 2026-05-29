<?php

namespace App\Filament\Resources\FormPendaftaranResource\Pages;

use App\Filament\Resources\FormPendaftaranResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFormPendaftaran extends CreateRecord
{
    protected static string $resource = FormPendaftaranResource::class;

    protected static bool $canCreateAnother = false;

    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
