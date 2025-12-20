<?php

declare(strict_types=1);

namespace App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Vorbereitung;

use App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Repeater\TableColumn;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\FusedGroup;
use Filament\Schemas\Components\Section;

final class MaterialBlock implements Block
{
    public static function type(): string
    {
        return 'material';
    }

    public static function makeView(array $block): Section
    {
        return Section::make()
            ->hiddenLabel()
            ->contained(false)
            ->schema([
                RepeatableEntry::make('data.items')
                    ->state($block['data']['items'])
                    ->label('Material')
                    ->table([
                        TableColumn::make('Bezeichnung'),
                        TableColumn::make('Anzahl'),
                    ])
                    ->schema([
                        TextEntry::make('label')->label('Bezeichnung'),
                        TextEntry::make('number')->label('Anzahl'),
                    ]),
            ]);
    }

    public static function makeForm(): \Filament\Forms\Components\Builder\Block
    {
        return \Filament\Forms\Components\Builder\Block::make(self::type())
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
            ]);
    }
}
