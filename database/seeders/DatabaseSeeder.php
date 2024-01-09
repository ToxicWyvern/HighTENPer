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
             'profileImage' => 'profileImages/default.jpg',
             'admin' => 1,
         ]);

        \App\Models\User::factory()->create([
            'name' => 'Ebram',
            'email' => 'ebram@example.com',
            'password'=> 'leaderboardboard',
            'profileImage' => 'profileImages/default.jpg',
            'admin' => 1,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Pedro',
            'email' => 'pedro@example.com',
            'password'=> 'leaderboardboard',
            'profileImage' => 'profileImages/default.jpg',
            'admin' => 1,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Nilo',
            'email' => 'nilo@example.com',
            'password'=> 'leaderboardboard',
            'profileImage' => 'profileImages/default.jpg',
            'admin' => 1,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'testuser',
            'email' => 'testuser@example.com',
            'password'=> 'leaderboardboard',
            'profileImage' => 'profileImages/default.jpg',
            'admin' => 0,
        ]);


        //maakt alle tracks aan die er op dit moment zijn in de game

        \App\Models\Race::factory()->create([
            'name' => 'Bahrain',
            'date'=>'24-02-29'
            ]);

        \App\Models\Race::factory()->create([
            'name' => 'Saudi Arabia',
            'date'=>'24-03-07'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Australia',
            'date'=>'24-03-22'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Japan',
            'date'=>'24-04-05'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'China',
            'date'=>'24-04-19'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'USA',
            'date'=>'24-05-03'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Italy',
            'date'=>'24-05-17'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Monaco',
            'date'=>'24-05-24'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Canada',
            'date'=>'24-06-07'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Spain',
            'date'=>'24-06-21'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Austria',
            'date'=>'24-06-28'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Great-Britain',
            'date'=>'24-07-05'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Hungary',
            'date'=>'24-07-19'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Belgium',
            'date'=>'24-07-26'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Netherlands',
            'date'=>'24-08-23'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Italy',
            'date'=>'24-08-30'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Azerbaijan',
            'date'=>'24-09-13'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Singapore',
            'date'=>'24-09-20'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'USA',
            'date'=>'24-10-18'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Mexico',
            'date'=>'24-10-25'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Brazil',
            'date'=>'24-11-01'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'USA',
            'date'=>'24-11-21'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Qatar',
            'date'=>'24-11-29'
        ]);
        \App\Models\Race::factory()->create([
            'name' => 'Abu Dhabi',
            'date'=>'24-12-06'
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


        //maakt alle tires aan

        \App\Models\tire::factory()->create([
            'tire' => 'Soft'
        ]);

        \App\Models\tire::factory()->create([
            'tire' => 'Medium'
        ]);

        \App\Models\tire::factory()->create([
            'tire' => 'Hard'
        ]);

        //$this->call(ScoreSeeder::class);
    }
}
