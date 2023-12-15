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
             'password'=> 'leaderboardboard',
         ]);

        \App\Models\User::factory()->create([
            'name' => 'Ebram',
            'email' => 'ebram@example.com',
            'password'=> 'leaderboardboard',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Pedro',
            'email' => 'pedro@example.com',
            'password'=> 'leaderboardboard',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Nilo',
            'email' => 'nilo@example.com',
            'password'=> 'leaderboardboard',
        ]);

        \App\Models\Race::factory()->create([
            'name' => 'Monza',
            'location' => 'Monza',
            'length' => 5.793,
            ]);
        \App\Models\Race::factory()->create([
            'name' => 'Silverstone',
            'location' => 'Silverstone',
            'length' => 5.891,
            ]);
        \App\Models\Race::factory()->create([
            'name' => 'Spa-Francorchamps',
            'location' => 'Stavelot',
            'length' => 7.004,
            ]);
        \App\Models\Race::factory()->create([
            'name' => 'Monaco',
            'location' => 'Monte Carlo',
            'length' => 3.337,
            ]);
        \App\Models\Race::factory()->create([
            'name' => 'Suzuka',
            'location' => 'Suzuka',
            'length' => 5.807,
            ]);
        \App\Models\Race::factory()->create([
            'name' => 'Circuit of the Americas',
            'location' => 'Austin',
            'length' => 5.513,
            ]);
        \App\Models\Race::factory()->create([
            'name' => 'Baku City Circuit',
            'location' => 'Baku',
            'length' => 6.003,
            ]);
        \App\Models\Race::factory()->create([
            'name' => 'Melbourne Grand Prix Circuit',
            'location' => 'Melbourne',
            'length' => 5.303,
            ]);
        \App\Models\Race::factory()->create([
            'name' => 'Shanghai International Circuit',
            'location' => 'Shanghai',
            'length' => 5.451,
            ]);
        \App\Models\Race::factory()->create([
            'name' => 'Hockenheimring',
            'location' => 'Hockenheim',
            'length' => 4.574,
            ]);
            // Add more tracks here'



    }
}
