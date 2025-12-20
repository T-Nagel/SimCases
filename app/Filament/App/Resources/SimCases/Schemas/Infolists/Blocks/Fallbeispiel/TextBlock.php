<?php

declare(strict_types=1);

namespace App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Fallbeispiel;

use App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Block;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;

final class TextBlock implements Block
{
    public static function type(): string
    {
        return 'text';
    }

    public static function makeView(array $block): Section
    {
        return Section::make()
            ->label($block['data']['label'] ?? 'Text')
            ->schema([
                TextEntry::make('data.text')
                    ->state($block['data']['text'])
                    ->hiddenLabel()
                    ->html(),
            ]);
    }

    public static function makeForm(): \Filament\Forms\Components\Builder\Block
    {
        return \Filament\Forms\Components\Builder\Block::make(self::type())
            ->label('Text')
            ->schema([
                TextInput::make('label')
                    ->label('Titel'),
                RichEditor::make('text')
                    ->label('Text'),
            ]);
    }
}
