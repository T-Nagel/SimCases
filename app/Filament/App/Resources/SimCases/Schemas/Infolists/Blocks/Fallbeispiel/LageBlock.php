<?php

declare(strict_types=1);

namespace App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Fallbeispiel;

use App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Block;
use Filament\Forms\Components\Textarea;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;

final class LageBlock implements Block
{
    public static function type(): string
    {
        return 'lage';
    }

    public static function makeView(array $block): Section
    {
        return Section::make()
            ->contained(false)
            ->schema([
                TextEntry::make('data.text')
                    ->state($block['data']['text'])
                    ->label('Lage vor Ort')
                    ->html(),
            ]);
    }

    public static function makeForm(): \Filament\Forms\Components\Builder\Block
    {
        return \Filament\Forms\Components\Builder\Block::make(self::type())
            ->label('Lage vor Ort')
            ->maxItems(1)
            ->schema([
                Textarea::make('text')
                    ->label('Beschreibung'),
            ]);
    }
}
