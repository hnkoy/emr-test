<?php

namespace App\Filament\Widgets;

use App\Models\AgregateDhs2;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class AgregateDhs2StatsOverview extends BaseWidget
{
    public function getStats(): array
    {
        $totals = $this->computeTotals();

        return [
            Stat::make('TESTED_MALARIA', number_format($totals['TESTED_MALARIA'] ?? 0))
                ->color('info'),
            Stat::make('TESTED_VIH', number_format($totals['TESTED_VIH'] ?? 0))
                ->color('success'),
            Stat::make('MALARIA_DEATHS', number_format($totals['MALARIA_DEATHS'] ?? 0))
                ->color('warning'),
            Stat::make('DE_OUTPATIENT_TOTAL', number_format($totals['DE_OUTPATIENT_TOTAL'] ?? 0))
                ->color('danger'),
        ];
    }

    private function computeTotals(): array
    {
        $totals = [
            'TESTED_MALARIA' => 0,
            'TESTED_VIH' => 0,
            'MALARIA_DEATHS' => 0,
            'DE_OUTPATIENT_TOTAL' => 0,
        ];

        AgregateDhs2::chunk(100, function ($rows) use (&$totals) {
            foreach ($rows as $row) {
                $dataValues = $row->dataValues;

                if (is_string($dataValues)) {
                    $dataValues = json_decode($dataValues, true) ?: [];
                }

                if (!is_array($dataValues)) {
                    continue;
                }

                foreach ($dataValues as $item) {
                    if (!is_array($item)) {
                        continue;
                    }

                    $key = $item['dataElement'] ?? null;
                    $value = $item['value'] ?? null;
                    if ($key === null || $value === null) {
                        continue;
                    }

                    $num = is_numeric($value) ? (float) $value : (float) preg_replace('/[^0-9.-]/', '', $value);

                    if (isset($totals[$key])) {
                        $totals[$key] += $num;
                    }
                }
            }
        });

        return $totals;
    }
}
