<?php

declare(strict_types=1);

namespace App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Fallbeispiel;

use App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Block;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;

final class OpqrstBlock implements Block
{
    public static function type(): string
    {
        return 'opqrst';
    }

    public static function makeView(array $block): Section
    {
        return Section::make()
            ->label('OPQRST: '.($block['data']['symptom']))
            ->schema([
                TextEntry::make('data.text')
                    ->state($block['data']['o'] ?? '')
                    ->placeholder('-')
                    ->label('Onset')
                    ->html(),
                TextEntry::make('data.text')
                    ->state($block['data']['p'] ?? '')
                    ->placeholder('-')
                    ->label('Provocation/Palliation')
                    ->html(),
                TextEntry::make('data.text')
                    ->state($block['data']['q'] ?? '')
                    ->placeholder('-')
                    ->label('Quality')
                    ->html(),
                TextEntry::make('data.text')
                    ->state($block['data']['r'] ?? '')
                    ->placeholder('-')
                    ->label('Radiation')
                    ->html(),
                TextEntry::make('data.text')
                    ->state($block['data']['s'] ?? '')
                    ->placeholder('-')
                    ->label('Severity')
                    ->html(),
                TextEntry::make('data.text')
                    ->state($block['data']['t'] ?? '')
                    ->placeholder('-')
                    ->label('Time')
                    ->html(),
            ]);
    }

    public static function makeForm(): \Filament\Forms\Components\Builder\Block
    {
        return \Filament\Forms\Components\Builder\Block::make(self::type())
            ->label('OPQRST')
            ->schema([
                TextInput::make('symptom')
                    ->label('Organ/Symptom')
                    ->required(),
                TextInput::make('o')
                    ->label('Onset'),
                TextInput::make('p')
                    ->label('Provocation/Palliation'),
                TextInput::make('q')
                    ->label('Quality'),
                TextInput::make('r')
                    ->label('Radiation'),
                TextInput::make('s')
                    ->label('Severity'),
                TextInput::make('t')
                    ->label('Time'),
            ]);
    }
}
