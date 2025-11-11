<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "user_id"=>$this->faker->numberBetween(1,11),
            "title"=>$this->faker->text($maxNbChars = 30),
            "body"=>$this->faker->realText(),
            "like_count"=>$this->faker->randomNumber(5, false),
        ];
    }
}