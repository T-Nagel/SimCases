<?php

namespace App\Filament\App\Resources\SimCases\Pages;

use App\Filament\App\Resources\SimCases\SimCaseResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

final class ViewSimCase extends ViewRecord
{
    protected static string $resource = SimCaseResource::class;
    
    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }

}
