<?php

declare(strict_types=1);

namespace App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Fallbeispiel;

use App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Block;
use Filament\Forms\Components\Repeater\TableColumn;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\FusedGroup;
use Filament\Schemas\Components\Section;

final class ChangeBlock implements Block
{
    public static function type(): string
    {
        return 'change';
    }

    public static function makeView(array $block): Section
    {
        return Section::make()
            ->label('Zustandsänderungen')
            ->contained(false)
            ->schema([
                RepeatableEntry::make('data')
                    ->state([''])
                    ->hiddenLabel()
                    ->table([
                        TableColumn::make('Zeitpunkt'),
                        TableColumn::make('Beschreibung'),
                    ])
                    ->schema([
                        TextEntry::make('time')
                            ->state($block['data']['time'])
                            ->label('Zeitpunkt')
                            ->html(),
                        TextEntry::make('change')
                            ->state($block['data']['desc'])
                            ->label('Beschreibung')
                            ->html(),
                    ]),
            ]);
    }

    public static function makeForm(): \Filament\Forms\Components\Builder\Block
    {
        return \Filament\Forms\Components\Builder\Block::make(self::type())
            ->label('Zustandsänderung')
            ->schema([
                FusedGroup::make([
                    Textarea::make('desc')
                        ->placeholder('Beschreibung')
                        ->required(),
                    TextInput::make('time')
                        ->placeholder('Zeitpunkt')
                        ->required(),
                ]),
            ]);
    }
}
