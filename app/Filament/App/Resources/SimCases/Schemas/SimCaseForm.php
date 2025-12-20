<?php

declare(strict_types=1);

namespace App\Filament\App\Resources\SimCases\Schemas;

use App\Filament\App\Resources\SimCases\Schemas\Infolists\DebriefingBlocks;
use App\Filament\App\Resources\SimCases\Schemas\Infolists\FallbeispielBlocks;
use App\Filament\App\Resources\SimCases\Schemas\Infolists\FilesBlocks;
use App\Filament\App\Resources\SimCases\Schemas\Infolists\VorbereitungBlocks;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

final class SimCaseForm
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
                                TextInput::make('name')
                                    ->label('Bezeichnung: Diagnose / Thema')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('author')
                                    ->label('Autoren')
                                    ->required()
                                    ->maxLength(255),
                                TextInput::make('organisation')
                                    ->label('Organisation')
                                    ->maxLength(255),
                            ]),
                        Tab::make('Vorbereitung')
                            ->schema([
                                Builder::make('vorbereitung')
                                    ->addActionLabel('Block hinzufügen')
                                    ->hiddenLabel()
                                    ->blockNumbers(false)
                                    ->label('Vorbereitung')
                                    ->blocks(VorbereitungBlocks::makeFormBlocks())
                                    ->required(),
                            ]),
                        Tab::make('Fallbeispiel')
                            ->schema([
                                Builder::make('fallbeispiel')
                                    ->blockNumbers(false)
                                    ->addActionLabel('Block hinzufügen')
                                    ->hiddenLabel()
                                    ->blocks([
                                        ...FallbeispielBlocks::makeFormBlocks(),

                                    ])
                                    ->required(),
                            ]),
                        Tab::make('Debriefing')
                            ->schema([
                                Builder::make('debriefing')
                                    ->blockNumbers(false)
                                    ->addActionLabel('Block hinzufügen')
                                    ->hiddenLabel()
                                    ->blocks([
                                        ...DebriefingBlocks::makeFormBlocks(),

                                    ])
                                    ->required(),
                            ]),
                        Tab::make('Dateien')
                            ->schema([
                                Builder::make('files')
                                    ->blockNumbers(false)
                                    ->addActionLabel('Block hinzufügen')
                                    ->hiddenLabel()
                                    ->blocks([
                                        ...FilesBlocks::makeFormBlocks(),
                                    ]),
                            ]),
                    ]),
            ]);
    }
}
