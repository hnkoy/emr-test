<?php

namespace App\Filament\Resources\Patients;

use App\Filament\Resources\Patients\Pages\CreatePatients;
use App\Filament\Resources\Patients\Pages\EditPatients;
use App\Filament\Resources\Patients\Pages\ListPatients;
use App\Filament\Resources\Patients\Pages\ViewPatients;
use App\Filament\Resources\Patients\Schemas\PatientsForm;
use App\Filament\Resources\Patients\Schemas\PatientsInfolist;
use App\Filament\Resources\Patients\Tables\PatientsTable;
use App\Models\Patient;
use BackedEnum;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;

class PatientsResource extends Resource
{
    protected static ?string $model = Patient::class;
     protected static ?string $modelLabel = 'Patient EMR';
    protected static ?string $pluralModelLabel = 'Patients EMR';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {


        return $schema
        ->components([
            TextInput::make('first_name')->required(),
            TextInput::make('last_name')->required(),
            TextInput::make('email')->email()->required(),
            TextInput::make('phone_number')->tel(),
            DatePicker::make('date_of_birth'),
            TextInput::make('gender'),
            TextInput::make('address'),
            TextInput::make('emergency_contact_name'),
            TextInput::make('emergency_contact_phone'),
            TextArea::make('allergies'),
            TextArea::make('current_medications'),
            TextInput::make('facility_name'),
            TextInput::make('facility_id'),
            Select::make('case')->options([
        'TESTED_MALARIA' => 'MALARIA',
        'TESTED_VIH' => 'VIH',
        'MALARIA_DEATHS' => 'MALARIA DEATHS',
        'DE_OUTPATIENT_TOTAL' => 'OUTPATIENT TOTAL',


    ])->required(),

            Textarea::make('notes'),





        ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return PatientsInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PatientsTable::configure($table);
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
            'index' => ListPatients::route('/'),
            'create' => CreatePatients::route('/create'),
            'view' => ViewPatients::route('/{record}'),
            'edit' => EditPatients::route('/{record}/edit'),
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
