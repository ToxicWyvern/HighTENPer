<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'Thijs',
             'email' => 'thijs@example.com',
         ]);

        \App\Models\Race::factory()->create([
            'name' => 'Monza', 'location' => 'Monza', 'length' => 5.793,
            'name' => 'Silverstone', 'location' => 'Silverstone', 'length' => 5.891,
            'name' => 'Spa-Francorchamps', 'location' => 'Stavelot', 'length' => 7.004,
            'name' => 'Monaco', 'location' => 'Monte Carlo', 'length' => 3.337,
            'name' => 'Suzuka', 'location' => 'Suzuka', 'length' => 5.807,
            'name' => 'Circuit of the Americas', 'location' => 'Austin', 'length' => 5.513,
            'name' => 'Baku City Circuit', 'location' => 'Baku', 'length' => 6.003,
            'name' => 'Melbourne Grand Prix Circuit', 'location' => 'Melbourne', 'length' => 5.303,
            'name' => 'Shanghai International Circuit', 'location' => 'Shanghai', 'length' => 5.451,
            'name' => 'Hockenheimring', 'location' => 'Hockenheim', 'length' => 4.574,
            // Add more tracks here'
            ]);


    }
}
