<?php

declare(strict_types=1);

namespace App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Fallbeispiel;

use App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Block;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;

final class SsssBlock implements Block
{
    public static function type(): string
    {
        return 'ssss';
    }

    public static function makeView(array $block): Section
    {
        return Section::make()
            ->label('SSSS')
            ->schema([
                TextEntry::make('data.text')
                    ->state($block['data']['scene'] ?? '')
                    ->placeholder('-')
                    ->label('Scene')
                    ->html(),
                TextEntry::make('data.text')
                    ->state($block['data']['safety'] ?? '')
                    ->placeholder('-')
                    ->label('Safety')
                    ->html(),
                TextEntry::make('data.text')
                    ->state($block['data']['situation'] ?? '')
                    ->placeholder('-')
                    ->label('Situation')
                    ->html(),
                TextEntry::make('data.text')
                    ->state($block['data']['support'] ?? '')
                    ->placeholder('-')
                    ->label('Support')
                    ->html(),
            ]);
    }

    public static function makeForm(): \Filament\Forms\Components\Builder\Block
    {
        return \Filament\Forms\Components\Builder\Block::make(self::type())
            ->label('SSSS')
            ->maxItems(1)
            ->schema([
                TextInput::make('scene')
                    ->label('Scene'),
                TextInput::make('safety')
                    ->label('Safety'),
                TextInput::make('situation')
                    ->label('Situation'),
                TextInput::make('support')
                    ->label('Support'),
            ]);
    }
}
