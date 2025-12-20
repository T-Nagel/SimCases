<?php

declare(strict_types=1);

namespace App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Vorbereitung;

use App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Block;
use Filament\Forms\Components\RichEditor;
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
        return Section::make()
            ->hiddenLabel()
            ->contained(false)
            ->schema([
                TextEntry::make('briefing')
                    ->state($block['data']['text'])
                    ->html(),
            ]);
    }

    public static function makeForm(): \Filament\Forms\Components\Builder\Block
    {
        return \Filament\Forms\Components\Builder\Block::make(self::type())
            ->label('Schauspielerbriefing')
            ->maxItems(1)
            ->schema([
                RichEditor::make('text')
                    ->hiddenLabel()
                    ->required(),
            ]);
    }
}
