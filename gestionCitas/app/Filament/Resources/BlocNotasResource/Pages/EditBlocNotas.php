<?php

namespace App\Filament\Resources\BlocNotasResource\Pages;

use App\Filament\Resources\BlocNotasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlocNotas extends EditRecord
{
    protected static string $resource = BlocNotasResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
