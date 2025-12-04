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
            "display_name"=>$this->faker->firstName() . " " . $this->faker->lastName(),
            "description"=>$this->faker->text($maxNbChars = 100),
            "favourite_club_id"=>$this->faker->numberBetween(1,21),
        ];
    }
}
