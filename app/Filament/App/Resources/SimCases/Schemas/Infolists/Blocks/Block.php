<?php

namespace App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks;

use Filament\Schemas\Components\Section;

interface Block
{
    public static function type(): string;

    public static function makeView(array $block): Section;

    public static function makeForm(): \Filament\Forms\Components\Builder\Block;
}
