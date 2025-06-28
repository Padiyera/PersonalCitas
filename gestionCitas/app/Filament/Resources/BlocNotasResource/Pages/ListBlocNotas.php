<?php

namespace App\Filament\Resources\BlocNotasResource\Pages;

use App\Filament\Resources\BlocNotasResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBlocNotas extends ListRecords
{
    protected static string $resource = BlocNotasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
