<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name"=>$this->faker->firstName($gender="male") . " " . $this->faker->lastName($gender="male"),
            "nationality"=>$this->faker->country(),
            "position"=>$this->faker->randomElement(["Goalkeeper","Defender","Midfielder","Attacker"]),
            "shirt_number"=>$this->faker->unique(true)->numberBetween(1,99),
            "appearances"=>$this->faker->numberBetween(0,500),
            "year_joined"=> $this->faker->numberBetween(2015, 2025),
            "club_id"=> $this->faker->numberBetween(1, 21),
        ];
    }
}
