<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Club>
 */
class ClubFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name"=> $this->faker->city() . " " . $this->faker->randomElement(["FC", "AFC", "Athletic", "Rovers"]),
            "year_founded"=> $this->faker->year($max='now'),
            "division"=> $this->faker->randomElement(['Premier League', 'Championship','League One']),
            "stadium_id"=> $this->faker->unique()->numberBetween(2,21),
        ];
    }
}