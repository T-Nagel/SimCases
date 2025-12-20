<?php

declare(strict_types=1);

namespace App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Fallbeispiel;

use App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Block;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;

final class VitalsBlock implements Block
{
    public static function type(): string
    {
        return 'vitals';
    }

    public static function makeView(array $block): Section
    {
        return Section::make()
            ->label('Vitalwerte')
            ->schema([
                TextEntry::make('data')
                    ->state($block['data']['hf'] ?? '')
                    ->label('Herzfrequenz')
                    ->placeholder('-')
                    ->html()
                    ->suffix(' /min'),
                TextEntry::make('data')
                    ->state($block['data']['nibd'] ?? '')
                    ->label('Blutdruck')
                    ->placeholder('-')
                    ->html()
                    ->suffix(' mmHg'),
                TextEntry::make('data')
                    ->state($block['data']['recap'] ?? '')
                    ->label('Rekap-Zeit')
                    ->placeholder('-')
                    ->html()
                    ->suffix(' s'),
                TextEntry::make('data')
                    ->state($block['data']['spo2'] ?? '')
                    ->label('SpO2')
                    ->placeholder('-')
                    ->html()
                    ->suffix(' %'),
                TextEntry::make('data')
                    ->state($block['data']['af'] ?? '')
                    ->label('Atemfrequenz')
                    ->placeholder('-')
                    ->html()
                    ->suffix(' /min'),
            ]);
    }

    public static function makeForm(): \Filament\Forms\Components\Builder\Block
    {
        return \Filament\Forms\Components\Builder\Block::make(self::type())
            ->label('Vitalwerte')
            ->schema([
                TextInput::make('hf')
                    ->label('Herzfrequenz')
                    ->numeric()
                    ->suffix(' /min'),
                TextInput::make('nibd')
                    ->label('Blutdruck')
                    ->suffix(' mmHg'),
                TextInput::make('recap')
                    ->numeric()
                    ->label('Rekap')
                    ->suffix(' s'),
                TextInput::make('spo2')
                    ->numeric()
                    ->label('SpO2')
                    ->suffix(' %'),
                TextInput::make('af')
                    ->numeric()
                    ->label('Atemfrequenz')
                    ->suffix(' /min'),
            ]);
    }
}
