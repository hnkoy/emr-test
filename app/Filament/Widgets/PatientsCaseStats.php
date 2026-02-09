<?php

namespace App\Filament\Widgets;

use App\Models\Patient;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PatientsCaseStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Suspected Malaria', Patient::where('case', 'SUSPECTED_MALARIA')->count()),
            Stat::make('Tested Malaria', Patient::where('case', 'TESTED_MALARIA')->count()),
            Stat::make('Confirmed Malaria', Patient::where('case', 'CONFIRMED_MALARIA')->count()),
            Stat::make('Malaria Deaths', Patient::where('case', 'MALARIA_DEATHS')->count()),

        ];
    }
}

