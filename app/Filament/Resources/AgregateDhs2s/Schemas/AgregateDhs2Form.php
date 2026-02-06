<?php

namespace App\Filament\Resources\AgregateDhs2s\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class AgregateDhs2Form
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('dataSet')
                    ->label('DataSet')
                    ->required()
                    ->maxLength(255),
                TextInput::make('orgUnit')
                    ->label('Unité Organisationnelle')
                    ->maxLength(255),
                DatePicker::make('completeDate')
                    ->label('Date Complète')
                    ->format('Y-m-d'),
                TextInput::make('period')
                    ->label('Période')
                    ->maxLength(255),
                Repeater::make('dataValues')
                    ->label('Valeurs de Données')
                    ->schema([
                        TextInput::make('dataElement')
                            ->label('Élément de Données')
                            ->required()
                            ->maxLength(255),
                        TextInput::make('value')
                            ->label('Valeur')
                            ->required(),
                    ])
                    ->columns(2)
                    ->addActionLabel('Ajouter une valeur'),
            ]);
    }
}
