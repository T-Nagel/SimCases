<?php

namespace App\Filament\App\Resources\SimCases\Widgets;

use App\Filament\App\Resources\SimCases\SimCaseResource;
use App\Models\SimCase;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

final class SimCasesCounter extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Anzahl der Fallbeispiele', SimCase::all()->count())
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                    'wire:click' => 'redirectToResource()',
                ]),
        ];
    }

    public function redirectToResource()
    {
        redirect()->to(SimCaseResource::getUrl('index'));
    }
}
