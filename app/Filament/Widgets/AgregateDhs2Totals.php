<?php

namespace App\Filament\Widgets;

use App\Models\AgregateDhs2;
use Filament\Widgets\ChartWidget;

class AgregateDhs2Totals extends ChartWidget
{
    public function getHeading(): ?string
    {
        return 'Totals (Data Values)';
    }

    public function getDescription(): ?string
    {
        $totals = $this->computeTotals();

        return sprintf(
            'TESTED_MALARIA: %s | TESTED_VIH: %s | MALARIA_DEATHS: %s | DE_OUTPATIENT_TOTAL: %s',
            number_format($totals['TESTED_MALARIA'] ?? 0),
            number_format($totals['TESTED_VIH'] ?? 0),
            number_format($totals['MALARIA_DEATHS'] ?? 0),
            number_format($totals['DE_OUTPATIENT_TOTAL'] ?? 0)
        );
    }

    protected function getData(): array
    {
        $totals = $this->computeTotals();

        return [
            'datasets' => [
                [
                    'label' => 'Total',
                    'data' => array_values($totals),
                ],
            ],
            'labels' => array_keys($totals),
        ];
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'tooltip' => [
                    'callbacks' => [
                        'label' => "function(context) {\n  const value = context.parsed.y ?? context.parsed;\n  return 'Total: ' + value;\n}",
                    ],
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
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
