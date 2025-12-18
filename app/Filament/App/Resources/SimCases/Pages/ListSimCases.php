<?php

declare(strict_types=1);

namespace App\Filament\App\Resources\SimCases\Pages;

use App\Filament\App\Resources\SimCases\SimCaseResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

final class ListSimCases extends ListRecords
{
    protected static string $resource = SimCaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
