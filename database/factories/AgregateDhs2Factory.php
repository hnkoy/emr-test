<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\agregate_dhs2>
 */
class AgregateDhs2Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $completeDate = $this->faker->date();

        return [
            'dataSet' => $this->faker->uuid(),
            'completeDate' => $completeDate,
            'period' => Carbon::createFromFormat('Y-m-d', $completeDate)->format('Ym'),
            'orgUnit' => $this->faker->uuid(),
            'dataValues' => 'RAS'
        ];
    }
}
