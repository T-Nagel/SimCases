<?php

declare(strict_types=1);

namespace App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Fallbeispiel;

use App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Block;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;

final class EinsatzmeldungBlock implements Block
{
    public static function type(): string
    {
        return 'einsatzmeldung';
    }

    public static function makeView(array $block): Section
    {
        return Section::make()
            ->hiddenLabel()
            ->contained(false)
            ->schema([
                TextEntry::make('data.text')
                    ->state($block['data']['text'])
                    ->label('Einsatzmeldung')
                    ->html(),
            ]);
    }

    public static function makeForm(): \Filament\Forms\Components\Builder\Block
    {
        return \Filament\Forms\Components\Builder\Block::make(self::type())
            ->label('Einsatzmeldung')
            ->maxItems(1)
            ->schema([
                TextInput::make('text')
                    ->label('Meldung')
                    ->required(),
            ]);
    }
}
