<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Stadium>
 */
class StadiumFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name"=> $this->faker->company() . " " . $this->faker->randomElement(['Stadium', 'Arena']),
            "capacity"=> $this->faker->randomNumber(5),
            "year_built"=> $this->faker->year(2025),
            "city"=> $this->faker->city(),
            "country"=> $this->faker->randomElement(['England', 'Wales']),
            "club_id"=> $this->faker->unique()->numberBetween(1,21),
        ];
    }
}
