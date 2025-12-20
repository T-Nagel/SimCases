<?php

declare(strict_types=1);

namespace App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Files;

use App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Block;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\FusedGroup;
use Filament\Schemas\Components\Section;
use Filament\Support\Enums\Size;

final class EcgBlock implements Block
{
    public static function type(): string
    {
        return 'ecg';
    }

    public static function makeView(array $block): Section
    {
        dump($block);

        return Section::make()
            ->contained(false)
            ->label('EKG: '.$block['data']['label'] ?? 'EKG')
            ->schema([
                Action::make('download-ecg')
                    ->label('Herunterladen')
                    ->url(fn () => $block['data'][self::type()] ? asset('storage/'.$block['data'][self::type()]) : '#')
                    ->openUrlInNewTab()
                    ->disabled(! $block['data'][self::type()])
                    ->size(Size::Small)
                    ->color('gray')
                    ->button(),
            ]);
    }

    public static function makeForm(): \Filament\Forms\Components\Builder\Block
    {
        return \Filament\Forms\Components\Builder\Block::make(self::type())
            ->label('EKG')
            ->schema([
                FusedGroup::make([
                    TextInput::make('label')
                        ->placeholder('Bezeichnung')
                        ->prefix('EKG: ')
                        ->required(),
                    FileUpload::make(self::type())
                        ->acceptedFileTypes(['application/pdf'])
                        ->directory('uploads')
                        ->disk('public')
                        ->hiddenLabel()
                        ->visibility('public')
                        ->required(),
                ]),
            ]);
    }
}
