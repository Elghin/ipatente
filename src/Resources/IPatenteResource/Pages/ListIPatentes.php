<?php

namespace App\Filament\Resources\IPatenteResource\Pages;

use App\Filament\Resources\IPatenteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIPatentes extends ListRecords
{
    protected static string $resource = IPatenteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
