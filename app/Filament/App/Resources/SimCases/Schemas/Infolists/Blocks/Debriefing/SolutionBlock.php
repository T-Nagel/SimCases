<?php

declare(strict_types=1);

namespace App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Debriefing;

use App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Block;
use Filament\Forms\Components\Builder;
use Filament\Forms\Components\RichEditor;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;

final class SolutionBlock implements Block
{
    public static function type(): string
    {
        return 'solution';
    }

    public static function makeView(array $block): Section
    {
        return Section::make()
            ->hiddenLabel()
            ->contained(false)
            ->schema([
                RepeatableEntry::make('solution')
                    ->label('Erwartetes Vorgehen')
                    ->state(fn ($record) => collect($record->debriefing)
                        ->where('type', 'solution')
                        ->values()
                        ->all()
                    )
                    ->schema([
                        TextEntry::make('data.text')
                            ->hiddenLabel()
                            ->html(),
                    ]),
            ]);
    }

    public static function makeForm(): Builder\Block
    {
        return Builder\Block::make(self::type())
            ->label('Erwartetes Vorgehen')
            ->maxItems(1)
            ->schema([
                RichEditor::make('text')
                    ->hiddenLabel()
                    ->required(),
            ]);
    }
}
