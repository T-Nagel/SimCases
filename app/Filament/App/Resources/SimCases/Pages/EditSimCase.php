<?php

namespace App\Filament\App\Resources\SimCases\Pages;

use App\Filament\App\Resources\SimCases\SimCaseResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditSimCase extends EditRecord
{
    protected static string $resource = SimCaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
