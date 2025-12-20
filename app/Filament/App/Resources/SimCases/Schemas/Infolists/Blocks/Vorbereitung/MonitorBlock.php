<?php

declare(strict_types=1);

namespace App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Vorbereitung;

use App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Block;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;

final class MonitorBlock implements Block
{
    public static function type(): string
    {
        return 'monitor';
    }

    public static function makeView(array $block): Section
    {
        return Section::make()
            ->label('Monitor')
            ->schema([
                TextEntry::make('data.ecg')
                    ->state($block['data']['ecg'])
                    ->placeholder('-')
                    ->label('EKG')
                    ->html(),
                TextEntry::make('data.hf')
                    ->state($block['data']['hf'])
                    ->label('Herzfrequenz')
                    ->placeholder('-')
                    ->html()
                    ->suffix(' /min'),
                TextEntry::make('data.spo2')
                    ->state($block['data']['spo2'])
                    ->label('SpO2')
                    ->placeholder('-')
                    ->html()
                    ->suffix(' %'),
                TextEntry::make('data.nibd')
                    ->state($block['data']['nibd'])
                    ->label('Blutdruck')
                    ->placeholder('-')
                    ->html()
                    ->suffix(' mmHg'),
                TextEntry::make('data.etco2')
                    ->state($block['data']['etco2'])
                    ->label('EtCO2')
                    ->placeholder('-')
                    ->html()
                    ->suffix(' mmHg'),
                TextEntry::make('data.temp')
                    ->state($block['data']['temp'])
                    ->label('Temperatur')
                    ->placeholder('-')
                    ->html()
                    ->suffix(' °C'),
                TextEntry::make('data.bz')
                    ->state($block['data']['bz'])
                    ->label('Blutzucker')
                    ->placeholder('-')
                    ->html()
                    ->suffix(' mg/dl'),
            ]);
    }

    public static function makeForm(): \Filament\Forms\Components\Builder\Block
    {
        return \Filament\Forms\Components\Builder\Block::make(self::type())
            ->label('Monitor Einstellung')
            ->maxItems(1)
            ->schema([
                TextInput::make('ecg')
                    ->label('EKG Rhythmus'),
                TextInput::make('hf')
                    ->numeric()
                    ->suffix('/min')
                    ->label('Herzfrequenz'),
                TextInput::make('spo2')
                    ->numeric()
                    ->suffix('%')
                    ->label('SpO2'),
                TextInput::make('nibd')
                    ->suffix('mmHg')
                    ->label('Blutdruck'),
                TextInput::make('etco2')
                    ->numeric()
                    ->suffix('mmHg')
                    ->label('EtCO2'),
                TextInput::make('temp')
                    ->numeric()
                    ->suffix('°C')
                    ->label('Temperatur'),
                TextInput::make('bz')
                    ->numeric()
                    ->suffix('mg/dl')
                    ->label('Blutzucker'),
            ]);
    }
}
