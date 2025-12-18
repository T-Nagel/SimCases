<?php

namespace App\Filament\App\Resources\SimCases;

use App\Filament\App\Resources\SimCases\Pages\CreateSimCase;
use App\Filament\App\Resources\SimCases\Pages\EditSimCase;
use App\Filament\App\Resources\SimCases\Pages\ListSimCases;
use App\Filament\App\Resources\SimCases\Pages\ViewSimCase;
use App\Filament\App\Resources\SimCases\Schemas\SimCaseForm;
use App\Filament\App\Resources\SimCases\Schemas\SimCaseInfolist;
use App\Filament\App\Resources\SimCases\Tables\SimCasesTable;
use App\Models\SimCase;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

final class SimCaseResource extends Resource
{
    protected static ?string $model = SimCase::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static bool $shouldSkipAuthorization = true;

    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $modelLabel = 'Fallbeispiel';
    protected static ?string $pluralModelLabel = 'Fallbeispiele';

    public static function form(Schema $schema): Schema
    {
        return SimCaseForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return SimCaseInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SimCasesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSimCases::route('/'),
            'create' => CreateSimCase::route('/create'),
            'view' => ViewSimCase::route('/{record}'),
            'edit' => EditSimCase::route('/{record}/edit'),
        ];
    }

}
