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
            Stat::make('Tested Malaria', Patient::where('case', 'TESTED_MALARIA')->count()),
            Stat::make('Tested VIH', Patient::where('case', 'TESTED_VIH')->count()),
            Stat::make('Malaria Deaths', Patient::where('case', 'MALARIA_DEATHS')->count()),
            Stat::make('Outpatient Total', Patient::where('case', 'DE_OUTPATIENT_TOTAL')->count()),
        ];
    }
}
