<?php

declare(strict_types=1);

namespace App\Filament\App\Resources\SimCases\Schemas\Infolists;

use App\Filament\App\Resources\SimCases\Schemas\Infolists\Blocks\Block;
use File;

final class FallbeispielBlocks
{
    public static function makeView(array $blocks): array
    {
        $blockClasses = self::discoverBlockClasses();

        return collect($blocks)
            ->map(function ($block) use ($blockClasses) {
                $class = $blockClasses[$block['type']] ?? null;

                return $class ? $class::makeView($block) : null;
            })
            ->filter()
            ->values()
            ->toArray();
    }

    public static function makeFormBlocks(): array
    {
        $blockClasses = self::discoverBlockClasses();

        return collect($blockClasses)
            ->map(fn (string $class) => $class::makeForm())
            ->values()
            ->toArray();
    }

    private static function discoverBlockClasses(): array
    {
        $path = app_path('Filament/App/Resources/SimCases/Schemas/Infolists/Blocks/Fallbeispiel');
        $namespace = 'App\\Filament\\App\\Resources\\SimCases\\Schemas\\Infolists\\Blocks\\Fallbeispiel';

        return collect(File::files($path))
            ->mapWithKeys(function ($file) use ($namespace) {
                $class = $namespace.'\\'.$file->getFilenameWithoutExtension();

                /** @var Block $class */
                return [$class::type() => $class];
            })
            ->toArray();
    }
}
