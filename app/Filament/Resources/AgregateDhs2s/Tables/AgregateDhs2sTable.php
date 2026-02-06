<?php

namespace App\Filament\Resources\AgregateDhs2s\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class AgregateDhs2sTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('dataSet')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('completeDate')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('period')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('orgUnit')
                    ->searchable()
                    ->sortable(),

                // `dataValues` column removed; values shown on record view instead
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
