<?php

declare(strict_types=1);

namespace App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Debriefing;

use App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Block;
use Filament\Forms\Components\RichEditor;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;

final class CriticalPointsBlock implements Block
{
    public static function type(): string
    {
        return 'critical_points';
    }

    public static function makeView(array $block): Section
    {
        return Section::make()
            ->label('Kritische Punkte')
            ->schema([
                TextEntry::make('data.text')
                    ->state($block['data']['text'])
                    ->hiddenLabel()
                    ->html(),
            ]);
    }

    public static function makeForm(): \Filament\Forms\Components\Builder\Block
    {
        return \Filament\Forms\Components\Builder\Block::make(self::type())
            ->label('Kritische Punkte')
            ->maxItems(1)
            ->schema([
                RichEditor::make('text')
                    ->hiddenLabel()
                    ->required(),
            ]);
    }
}
