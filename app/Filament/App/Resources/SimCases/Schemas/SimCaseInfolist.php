<?php

declare(strict_types=1);

namespace App\Filament\App\Resources\SimCases\Schemas;

use App\Filament\App\Resources\SimCases\Schemas\Infolists\FilesBlocks;
use App\Filament\App\Resources\SimCases\Schemas\Infolists\VorbereitungBlocks;
use App\Filament\App\Resources\SimCases\Schemas\Infolists\DebriefingBlocks;
use App\Filament\App\Resources\SimCases\Schemas\Infolists\FallbeispielBlocks;
use Filament\Forms\Components\Repeater\TableColumn;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

final class SimCaseInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            Tabs::make('Tabs')
                ->columnSpanFull()
                ->tabs([
                    Tab::make('Allgemeine Infos')
                        ->schema([
                            TextEntry::make('name'),
                            TextEntry::make('author')->label('Autor'),
                            TextEntry::make('organisation'),
                        ]),
                    Tab::make('Vorbereitung')
                        ->schema(function ($record) {
                            return VorbereitungBlocks::makeView($record->vorbereitung ?? []);
                        }),
                    Tab::make('Fallbeispiel')
                        ->schema(function ($record) {
                            return FallbeispielBlocks::makeView($record->fallbeispiel ?? []);
                        }),
                    Tab::make('Debriefing')
                        ->schema(function ($record) {
                            return DebriefingBlocks::makeView($record->debriefing ?? []);
                        }),
                    Tab::make('Dateien')
                        ->schema(function ($record) {
                            return FilesBlocks::makeView($record->files ?? []);
                        }),
                ]),
        ]);
    }
}
