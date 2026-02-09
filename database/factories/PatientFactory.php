<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'date_of_birth' => $this->faker->dateTimeBetween('-80 years', '-18 years'),
            'gender' => $this->faker->randomElement(['Male', 'Female', 'Other']),
            'phone_number' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->address(),
            'emergency_contact_name' => $this->faker->name(),
            'emergency_contact_phone' => $this->faker->phoneNumber(),
            'allergies' => $this->faker->optional()->sentence(),
            'current_medications' => $this->faker->optional()->sentence(),
            'facility_name' => $this->faker->company(),
            'facility_id' => $this->faker->uuid(),
            'case' => $this->faker->randomElement(['SUSPECTED_MALARIA', 'TESTED_MALARIA', 'CONFIRMED_MALARIA', 'MALARIA_DEATHS']),
            'notes' => $this->faker->optional()->paragraph(),
        ];
    }
}
