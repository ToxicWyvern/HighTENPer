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
        return [
            'position' => fake()->unique()->randomFloat(0, 1, 22),
            'driver' => fake()->firstName,
            'team' => fake()->unique()->randomElement(['Red Bull Racing', 'Mercedes', 'Ferrari', 'McLaren', 'Aston Martin', 'Alpine', 'Williams', 'AlphaTauri', 'Alfa Romeo', 'Haas F1 Team']),
            'best' => fake()->time,
            'time' => fake()->time,
            'stops' => fake()->randomFloat(0,0, 80),
            'grid' => fake()->randomFloat(0,1,22),
            'points' => fake()->randomFloat(0,0,20),
        ];
    }
}
