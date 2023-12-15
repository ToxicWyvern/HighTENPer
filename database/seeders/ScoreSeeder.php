<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Score;
use App\Models\User;
use App\Models\Race;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $race = Race::first(); // Get a race (adjust this based on your application logic)

        if ($user) {
            \App\Models\Score::factory(10)->create([
                'user_id' => $user->id,
                'race_id' => $race->id,
            ]);
        } else {
            // Handle the case when no user is found
            echo "No user found. Make sure you have at least one user in the database.";
        }



    }
}
