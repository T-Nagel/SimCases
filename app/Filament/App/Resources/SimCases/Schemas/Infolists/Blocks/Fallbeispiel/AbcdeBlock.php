<?php

declare(strict_types=1);

namespace App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Fallbeispiel;

use App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Block;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;

final class AbcdeBlock implements Block
{
    public static function type(): string
    {
        return 'abcde';
    }

    public static function makeView(array $block): Section
    {
        return Section::make()
            ->label('ABCDE Schema ('.$block['data']['type'].')')
            ->schema([
                TextEntry::make('data')
                    ->state($block['data']['A'] ?? '')
                    ->label('A-Problem')
                    ->placeholder('-')
                    ->html(),
                TextEntry::make('data')
                    ->state($block['data']['B'] ?? '')
                    ->label('B-Problem')
                    ->placeholder('-')
                    ->html(),
                TextEntry::make('data')
                    ->state($block['data']['C'] ?? '')
                    ->label('C-Problem')
                    ->placeholder('-')
                    ->html(),
                TextEntry::make('data')
                    ->state($block['data']['D'] ?? '')
                    ->label('D-Problem')
                    ->placeholder('-')
                    ->html(),
                TextEntry::make('data')
                    ->state($block['data']['E'] ?? '')
                    ->label('E-Problem')
                    ->placeholder('-')
                    ->html(),
            ]);
    }

    public static function makeForm(): \Filament\Forms\Components\Builder\Block
    {
        return \Filament\Forms\Components\Builder\Block::make(self::type())
            ->label('ABCDE Schema')
            ->schema([
                Select::make('type')
                    ->label('Art')
                    ->options([
                        'primary' => 'Primary Assessment',
                        'secondary' => 'Secondary Assessment',
                        'reassess' => 'Reassessment',
                    ])
                    ->required(),
                TextInput::make('A'),
                TextInput::make('B'),
                TextInput::make('C'),
                TextInput::make('D'),
                TextInput::make('E'),
            ]);
    }
}
