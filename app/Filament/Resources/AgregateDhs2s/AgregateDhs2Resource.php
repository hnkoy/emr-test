<?php

namespace App\Filament\Resources\AgregateDhs2s;

use App\Filament\Resources\AgregateDhs2s\Pages\CreateAgregateDhs2;
use App\Filament\Resources\AgregateDhs2s\Pages\EditAgregateDhs2;
use App\Filament\Resources\AgregateDhs2s\Pages\ListAgregateDhs2s;
use App\Filament\Resources\AgregateDhs2s\Pages\ViewAgregateDhs2;
use App\Filament\Resources\AgregateDhs2s\Schemas\AgregateDhs2Form;
use App\Filament\Resources\AgregateDhs2s\Schemas\AgregateDhs2Infolist;
use App\Filament\Resources\AgregateDhs2s\Tables\AgregateDhs2sTable;
use App\Models\AgregateDhs2;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AgregateDhs2Resource extends Resource
{
    protected static ?string $model = AgregateDhs2::class;

    protected static ?string $modelLabel = 'Données Aggregé DHS2';

    protected static ?string $pluralModelLabel = 'Données Aggregé DHS2';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return AgregateDhs2Form::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return AgregateDhs2Infolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AgregateDhs2sTable::configure($table);
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
            'index' => ListAgregateDhs2s::route('/'),
            'create' => CreateAgregateDhs2::route('/create'),
            'view' => ViewAgregateDhs2::route('/{record}'),
            'edit' => EditAgregateDhs2::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
