<?php

namespace App\Filament\Resources\SchoolProfileResource\Pages;

use App\Filament\Resources\SchoolProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSchoolProfile extends CreateRecord
{
    protected static string $resource = SchoolProfileResource::class;

     // redirect to index category pages after CRUD (Create, Read, Update, Delete)
    public function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
