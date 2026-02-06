<?php

namespace Database\Factories;

use App\Models\AgregateDhs2;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataValues>
 */
class DataValuesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dataElements = [
            'TESTED_MALARIA',
            'TESTED_VIH',
            'MALARIA_DEATHS',
            'DE_OUTPATIENT_TOTAL',
        ];

        return [
            'agregate_dhs2_id' => AgregateDhs2::factory(),
            'dataElement' => $this->faker->randomElement($dataElements),
            'value' => (string) $this->faker->numberBetween(1, 100),
        ];
    }
}


