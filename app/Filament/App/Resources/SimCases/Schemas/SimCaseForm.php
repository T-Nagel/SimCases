<?php

declare(strict_types=1);

namespace App\Filament\App\Resources\SimCases\Schemas;

use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Builder\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\FusedGroup;
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
                                    ->label('Bezeichnung')
                                    ->required()
                                    ->maxLength(255),
                            ]),
                        Tab::make('Vorbereitung')
                            ->schema([
                                Builder::make('vorbereitung')
                                    ->addActionLabel('Block hinzufügen')
                                    ->hiddenLabel()
                                    ->blockNumbers(false)
                                    ->blocks([
                                        Block::make('briefing')
                                            ->label('Schauspielerbriefing')
                                            ->maxItems(1)
                                            ->schema([
                                                RichEditor::make('text')
                                                    ->hiddenLabel()
                                                    ->required(),
                                            ]),
                                        Block::make('material')
                                            ->label('Material')
                                            ->maxItems(1)
                                            ->schema([
                                                Repeater::make('items')
                                                    ->hiddenLabel()
                                                    ->schema([
                                                        FusedGroup::make([
                                                            TextInput::make('label')
                                                                ->placeholder('Material')
                                                                ->required(),
                                                            TextInput::make('number')
                                                                ->placeholder('Anzahl')
                                                                ->numeric()
                                                                ->required(),
                                                        ])
                                                            ->columns(2),
                                                    ]),
                                            ]),
                                    ])
                                    ->label('Vorbereitung')
                                    ->required(),
                            ]),
                        Tab::make('Fallbeispiel')
                            ->schema([
                                Builder::make('fallbeispiel')
                                    ->blockNumbers(false)
                                    ->addActionLabel('Block hinzufügen')
                                    ->hiddenLabel()
                                    ->blocks([
                                        Block::make('einsatzmeldung')
                                            ->label('Einsatzmeldung')
                                            ->maxItems(1)
                                            ->schema([
                                                TextInput::make('text')
                                                    ->label('Meldung')
                                                    ->required(),
                                            ]),
                                        Block::make('lage')
                                            ->label('Lage vor Ort')
                                            ->maxItems(1)
                                            ->schema([
                                                Textarea::make('Beschreibung'),
                                            ]),
                                        Block::make('primary')
                                            ->label('ABCDE Schema')
                                            ->maxItems(1)
                                            ->schema([
                                                Select::make('Art')
                                                    ->options([
                                                        'primary' => 'Primary Assessment',
                                                        'secondary' => 'Secondary Assessment',
                                                    ]),
                                                TextInput::make('A'),
                                                TextInput::make('B'),
                                                TextInput::make('C'),
                                                TextInput::make('D'),
                                                TextInput::make('E'),
                                            ]),
                                        Block::make('vitals')
                                            ->label('Vitalwerte')
                                            ->maxItems(1)
                                            ->schema([
                                                TextInput::make('HF')
                                                    ->label('Herzfrequenz'),
                                                TextInput::make('RR')
                                                    ->label('Blutdruck'),
                                                TextInput::make('Rekap')
                                                    ->label('Rekap'),
                                                TextInput::make('SpO2')
                                                    ->label('SpO2'),
                                                TextInput::make('AF')
                                                    ->label('Atemfrequenz'),
                                            ]),
                                    ])
                                    ->required(),
                            ]),
                        Tab::make('Debriefing')
                            ->schema([
                                Builder::make('debriefing')
                                    ->hiddenLabel()
                                    ->blockNumbers(false)
                                    ->addActionLabel('Block hinzufügen')
                                    ->schema([
                                        Block::make('points')
                                            ->label('Lernziele')
                                            ->schema([
                                                Repeater::make('items')
                                                    ->hiddenLabel()
                                                    ->addActionLabel('Lernziel hinzufügen')
                                                    ->schema([
                                                        TextInput::make('point')
                                                            ->hiddenLabel()
                                                            ->placeholder('Lernziel')
                                                            ->required(),
                                                    ]),
                                            ]),
                                    ]),
                            ]),
                    ]),
            ]);
    }
}
