<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id"=>$this->faker->unique()->numberBetween(2, 11),
            "display_name"=>$this->faker->userName(),
            "description"=>$this->faker->text($maxNbChars = 100),
            "favourite_club_id"=>$this->faker->numberBetween(1,21),
        ];
    }
}
