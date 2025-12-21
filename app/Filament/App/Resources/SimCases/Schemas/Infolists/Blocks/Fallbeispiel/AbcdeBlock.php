<?php

declare(strict_types=1);

namespace App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Fallbeispiel;

use App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Block;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Repeater\TableColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\FusedGroup;
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
            ->contained(false)
            ->schema([
                RepeatableEntry::make('abcde_details')
                    ->hiddenLabel()
                    ->state($block['data']['details'] ?? [])
                    ->table([
                        TableColumn::make(''),
                        TableColumn::make('Problem'),
                        TableColumn::make('Vitals'),
                        TableColumn::make('Therapie'),
                    ])
                    ->schema([
                        TextEntry::make('step')
                            ->label('Schritt')
                            ->placeholder('-')
                            ->html(),
                        TextEntry::make('problem')
                            ->label('Problem')
                            ->placeholder('-')
                            ->html(),
                        TextEntry::make('vitals')
                            ->label('Vitals')
                            ->placeholder('-')
                            ->html(),
                        TextEntry::make('therapy')
                            ->label('Therapie')
                            ->placeholder('-')
                            ->html(),
                    ]),
            ]);
    }

    public static function makeForm(): \Filament\Forms\Components\Builder\Block
    {
        return \Filament\Forms\Components\Builder\Block::make(self::type())
            ->label('ABCDE Tabelle')
            ->schema([
                Select::make('type')
                    ->label('Art')
                    ->options([
                        'primary' => 'Primary Assessment',
                        'secondary' => 'Secondary Assessment',
                        'reassess' => 'Reassessment',
                    ])
                    ->required(),
                FusedGroup::make([
                    Hidden::make('details.a.step')
                        ->default('A'),
                    TextInput::make('details.a.problem')
                        ->placeholder('Problem'),
                    TextInput::make('details.a.vitals')
                        ->placeholder('Vitals'),
                    TextInput::make('details.a.therapy')
                        ->placeholder('Therapie'),
                ])->label('A')->columns(3),
                FusedGroup::make([
                    Hidden::make('details.b.step')
                        ->default('B'),
                    TextInput::make('details.b.problem')
                        ->placeholder('Problem'),
                    TextInput::make('details.b.vitals')
                        ->placeholder('Vitals'),
                    TextInput::make('details.b.therapy')
                        ->placeholder('Therapie'),
                ])->label('B')->columns(3),
                FusedGroup::make([
                    Hidden::make('details.c.step')
                        ->default('C'),
                    TextInput::make('details.c.problem')
                        ->placeholder('Problem'),
                    TextInput::make('details.c.vitals')
                        ->placeholder('Vitals'),
                    TextInput::make('details.c.therapy')
                        ->placeholder('Therapie'),
                ])->label('C')->columns(3),
                FusedGroup::make([
                    Hidden::make('details.d.step')
                        ->default('D'),
                    TextInput::make('details.d.problem')
                        ->placeholder('Problem'),
                    TextInput::make('details.d.vitals')
                        ->placeholder('Vitals'),
                    TextInput::make('details.d.therapy')
                        ->placeholder('Therapie'),
                ])->label('D')->columns(3),
                FusedGroup::make([
                    Hidden::make('details.e.step')
                        ->default('E'),
                    TextInput::make('details.e.problem')
                        ->placeholder('Problem'),
                    TextInput::make('details.e.vitals')
                        ->placeholder('Vitals'),
                    TextInput::make('details.e.therapy')
                        ->placeholder('Therapie'),
                ])->label('E')->columns(3),
            ]);
    }
}
