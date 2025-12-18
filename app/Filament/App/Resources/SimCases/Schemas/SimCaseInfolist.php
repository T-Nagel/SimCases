<?php

declare(strict_types=1);

namespace App\Filament\App\Resources\SimCases\Schemas;

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
        return $schema
            ->components([
                Tabs::make('Tabs')
                    ->columnSpanFull()
                    ->tabs([
                        Tab::make('Allgemeine Infos')
                            ->schema([
                                TextEntry::make('name'),
                            ]),
                        Tab::make('Briefing')
                            ->schema([
                                RepeatableEntry::make('material')
                                    ->contained(false)
                                    ->label('Material')
                                    ->state(fn ($record) => collect($record->vorbereitung)
                                        ->where('type', 'material')
                                        ->values()
                                        ->all()
                                    )
                                    ->schema([
                                        RepeatableEntry::make('data.items')
                                            ->hiddenLabel()
                                            ->table([
                                                TableColumn::make('Bezeichnung'),
                                                TableColumn::make('Anzahl'),
                                            ])
                                            ->schema([
                                                TextEntry::make('label')->label('Bezeichnung'),
                                                TextEntry::make('number')->label('Anzahl'),
                                            ]),
                                    ]),

                                RepeatableEntry::make('briefing')
                                    ->label('Schauspielerbriefing')
                                    ->state(fn ($record) => collect($record->vorbereitung)
                                        ->where('type', 'briefing')
                                        ->values()
                                        ->all()
                                    )
                                    ->schema([
                                        TextEntry::make('data.text')
                                            ->hiddenLabel()
                                            ->html(),
                                    ]),

                            ]),
                        Tab::make('Fallbeispiel')
                            ->schema([
                                RepeatableEntry::make('einsatzmeldung')
                                    ->contained(false)
                                    ->label('Einsatzmeldung')
                                    ->state(fn ($record) => collect($record->fallbeispiel)
                                        ->where('type', 'einsatzmeldung')
                                        ->values()
                                        ->all()
                                    )
                                    ->schema([
                                        TextEntry::make('data.text')
                                            ->hiddenLabel()
                                            ->html(),
                                    ]),
                            ]),
                    ]),
            ]);
    }
}
