<?php

declare(strict_types=1);

namespace App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Fallbeispiel;

use App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Block;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;

final class AmlsFilterBlock implements Block
{
    public static function type(): string
    {
        return 'amls_filter';
    }

    public static function makeView(array $block): Section
    {
        return Section::make()
            ->label('AMLS Trichter')
            ->schema([
                TextEntry::make('data.text')
                    ->state($block['data']['status'] ?? '')
                    ->placeholder('-')
                    ->label('Einschätzung')
                    ->html(),
                TextEntry::make('data.text')
                    ->state($block['data']['lead_symptom'] ?? '')
                    ->placeholder('-')
                    ->label('Leitsymptom')
                    ->html(),
                TextEntry::make('data.text')
                    ->state($block['data']['dd'] ?? '')
                    ->placeholder('-')
                    ->label('Differentialdiagnosen')
                    ->html(),
                TextEntry::make('data.text')
                    ->state($block['data']['diagnosis'] ?? '')
                    ->placeholder('-')
                    ->label('Verdachtsdiagnose')
                    ->html(),
            ]);
    }

    public static function makeForm(): \Filament\Forms\Components\Builder\Block
    {
        return \Filament\Forms\Components\Builder\Block::make(self::type())
            ->label('AMLS Trichter')
            ->maxItems(1)
            ->schema([
                Select::make('status')
                    ->options([
                        'Lebensbedroht' => 'Lebensbedroht',
                        'Ernsthaft krank' => 'Ernsthaft krank',
                        'Unkritisch' => 'Unkritisch',
                    ])
                    ->label('Einschätzung'),
                TextInput::make('lead_symptom')
                    ->label('Leitsymptom'),
                RichEditor::make('dd')
                    ->label('Differentialdiagnosen'),
                TextInput::make('diagnosis')
                    ->label('Verdachtsdiagnose'),
            ]);
    }
}
