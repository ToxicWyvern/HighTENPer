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
        // \App\Models\User::factory(10)->create(); //kan 10 fake users maken, maar aan 1 hebben we ook genoeg

        //zorgt dat er altijd een account is voor Thijs, Ebram, Pedro, Nilo en een testuser

         \App\Models\User::factory()->create([
             'name' => 'Thijs',
             'email' => 'thijs@example.com',
             'password'=> 'leaderboardboard',
             'admin' => true,
         ]);

        \App\Models\User::factory()->create([
            'name' => 'Ebram',
            'email' => 'ebram@example.com',
            'password'=> 'leaderboardboard',
            'admin' => 1,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Pedro',
            'email' => 'pedro@example.com',
            'password'=> 'leaderboardboard',
            'admin' => 1,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Nilo',
            'email' => 'nilo@example.com',
            'password'=> 'leaderboardboard',
            'admin' => 1,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'testuser',
            'email' => 'testuser@example.com',
            'password'=> 'leaderboardboard',
            'admin' => 0,
        ]);


        //maakt alle tracks aan die er op dit moment zijn in de game

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
            // Add more tracks here

        //maakt alle teams aan die er op dit moment zijn in de game

        \App\Models\team::factory()->create([
            'team' => 'Red Bull Racing'
        ]);

        \App\Models\team::factory()->create([
            'team' => 'Mercedes'
        ]);

        \App\Models\team::factory()->create([
            'team' => 'McLaren'
        ]);

        \App\Models\team::factory()->create([
            'team' => 'Ferrari'
        ]);

        \App\Models\team::factory()->create([
            'team' => 'Aston Martin'
        ]);

        \App\Models\team::factory()->create([
            'team' => 'Alpine'
        ]);

        \App\Models\team::factory()->create([
            'team' => 'Williams'
        ]);

        \App\Models\team::factory()->create([
            'team' => 'AlphaTauri'
        ]);

        \App\Models\team::factory()->create([
            'team' => 'Alfa Romeo'
        ]);

        \App\Models\team::factory()->create([
            'team' => 'Haas F1 Team'
        ]);

        \App\Models\tire::factory()->create([
            'tire' => 'Soft'
        ]);

        \App\Models\tire::factory()->create([
            'tire' => 'Medium'
        ]);

        \App\Models\tire::factory()->create([
            'tire' => 'Hard'
        ]);
    }
}
