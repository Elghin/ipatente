<?php

namespace App\Filament\Resources\IPatenteResource\Pages;

use App\Filament\Resources\IPatenteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIPatente extends EditRecord
{
    protected static string $resource = IPatenteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
