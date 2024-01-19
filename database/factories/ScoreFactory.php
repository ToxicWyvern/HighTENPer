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
    /**
     * De functie retourneert een array met een willekeurig geselecteerde scoreafbeelding en een
     * nep-beste tijd.
     * 
     * return array Er wordt een array geretourneerd. De array bevat twee sleutelwaardeparen:
     * 'scoreImage' en 'best'. De waarde van 'scoreImage' is een willekeurig geselecteerd element uit
     * de array ['1.png', '2.png', '3.png', '4.png']. De waarde van 'beste' is een willekeurig
     * gegenereerde tijd.
     */
    public function definition(): array
    {
        return [ //fake data
            'scoreImage' => fake()->randomElement(['1.png', '2.png', '3.png', '4.png']),
            'best' => fake()->time,
        ];
    }
}
