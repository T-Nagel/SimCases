<?php

declare(strict_types=1);

namespace App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Debriefing;

use App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Block;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;

final class GoalsBlock implements Block
{
    public static function type(): string
    {
        return 'goals';
    }

    public static function makeView(array $block): Section
    {
        return Section::make()
            ->label('Lernziele')
            ->schema([
                RepeatableEntry::make('data.items')
                    ->hiddenLabel()
                    ->contained(false)
                    ->state($block['data']['items'])
                    ->schema([
                        TextEntry::make('text')
                            ->hiddenLabel()
                            ->html(),
                    ]),
            ]);
    }

    public static function makeForm(): \Filament\Forms\Components\Builder\Block
    {
        return \Filament\Forms\Components\Builder\Block::make(self::type())
            ->label('Lernziele')
            ->maxItems(1)
            ->schema([
                Repeater::make('items')
                    ->hiddenLabel()
                    ->itemLabel('Lernziel')
                    ->itemNumbers()
                    ->addActionLabel('Lernziel hinzufügen')
                    ->schema([
                        TextInput::make('text')
                            ->hiddenLabel()
                            ->placeholder('Lernziel')
                            ->required(),
                    ]),
            ]);
    }
}
