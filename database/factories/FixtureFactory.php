<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fixture>
 */
class FixtureFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "home_team_id"=>$this->faker->unique()->numberBetween(1,21),
            "away_team_id"=>$this->faker->unique(true)->numberBetween(1,21),
            "home_goals"=>$this->faker->numberBetween(0,5),
            "away_goals"=>$this->faker->numberBetween(0,5),
            "stadium_id"=>$this->faker->numberBetween(1, 21),
        ];
    }
}
