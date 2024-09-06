<?php

namespace App\Filament\Resources\IPatenteResource\Pages;

use App\Filament\Resources\IPatenteResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateIPatente extends CreateRecord
{
    protected static string $resource = IPatenteResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
