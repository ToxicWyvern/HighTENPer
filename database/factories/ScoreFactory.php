<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\score>
 */
class ScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [ //fake data
            'scoreImage' => fake()->randomElement(['1.png', '2.png', '3.png', '4.png']),
            'best' => fake()->time,
        ];
    }
}
