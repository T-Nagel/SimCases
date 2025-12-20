<?php

declare(strict_types=1);

namespace App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Vorbereitung;

use App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Block;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\Repeater\TableColumn;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;

final class BriefingBlock implements Block
{
    public static function type(): string
    {
        return 'briefing';
    }

    public static function makeView(array $block): Section
    {
        dump($block);

        return Section::make()
            ->label('Schauspielerinfos')
            ->schema([
                TextEntry::make('briefing')
                    ->label('Informationen')
                    ->state($block['data']['text'])
                    ->html(),
                RepeatableEntry::make('data')
                    ->state($block['data']['people'] ?? [])
                    ->label('Personen')
                    ->table([
                        TableColumn::make('Name'),
                        TableColumn::make('Rolle'),
                        TableColumn::make('Alter'),
                    ])
                    ->schema([
                        TextEntry::make('data.name')
                            ->label('Name'),
                        TextEntry::make('data.role')->label('Rolle'),
                        TextEntry::make('data.age')->label('Alter')->suffix(' Jahre'),
                    ]),
            ]);
    }

    public static function makeForm(): Builder\Block
    {
        return Builder\Block::make(self::type())
            ->label('Schauspielerbriefing')
            ->maxItems(1)
            ->schema([
                RichEditor::make('text')
                    ->hiddenLabel()
                    ->required(),
                Builder::make('people')
                    ->addActionLabel('Person hinzufügen')
                    ->hiddenLabel()
                    ->blockNumbers(true)
                    ->label('Person')
                    ->blocks([
                        Builder\Block::make('person')
                            ->label('Person')
                            ->schema([
                                TextInput::make('name')
                                    ->label('Name'),
                                TextInput::make('role')
                                    ->label('Rolle'),
                                TextInput::make('age')
                                    ->label('Alter')
                                    ->numeric()
                                    ->suffix(' Jahre'),
                            ]),
                    ]),
            ]);
    }
}
