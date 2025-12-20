<?php

declare(strict_types=1);

namespace App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Fallbeispiel;

use App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Block;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;

final class SamplerBlock implements Block
{
    public static function type(): string
    {
        return 'sampler';
    }

    public static function makeView(array $block): Section
    {
        return Section::make()
            ->label('Anamnese')
            ->schema([
                TextEntry::make('data')
                    ->state($block['data']['s'] ?? '')
                    ->label('Symptome')
                    ->placeholder('-')
                    ->html(),
                TextEntry::make('data')
                    ->state($block['data']['a'] ?? '')
                    ->label('Allergien')
                    ->placeholder('-')
                    ->html(),
                TextEntry::make('data')
                    ->state($block['data']['m'] ?? '')
                    ->label('Medikamente')
                    ->placeholder('-')
                    ->html(),
                TextEntry::make('data')
                    ->state($block['data']['p'] ?? '')
                    ->label('Patientengeschichte')
                    ->placeholder('-')
                    ->html(),
                TextEntry::make('data')
                    ->state($block['data']['l'] ?? '')
                    ->label('Letzte...')
                    ->placeholder('-')
                    ->html(),
                TextEntry::make('data')
                    ->state($block['data']['e'] ?? '')
                    ->label('Ereignis')
                    ->placeholder('-')
                    ->html(),
                TextEntry::make('data')
                    ->state($block['data']['l'] ?? '')
                    ->label('Risikofaktoren')
                    ->placeholder('-')
                    ->html(),
                TextEntry::make('data')
                    ->state($block['data']['sw'] ?? '')
                    ->label('Schwangerschaft?')
                    ->placeholder('-')
                    ->html(),
            ]);
    }

    public static function makeForm(): \Filament\Forms\Components\Builder\Block
    {
        return \Filament\Forms\Components\Builder\Block::make(self::type())
            ->label('Anamnese')
            ->schema([
                TextInput::make('s')
                    ->label('Symptome'),
                TextInput::make('a')
                    ->label('Allergien'),
                TextInput::make('m')
                    ->label('Medikamente'),
                TextInput::make('p')
                    ->label('Patientengeschichte'),
                TextInput::make('l')
                    ->label('Letzte ...'),
                TextInput::make('e')
                    ->label('Ereignis'),
                TextInput::make('r')
                    ->label('Risikofaktoren'),
                TextInput::make('sw')
                    ->label('Schwangerschaft?'),
            ]);
    }
}
