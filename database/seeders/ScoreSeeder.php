<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Score;
use App\Models\User;
use App\Models\Race;
use App\Models\Tire;
use App\Models\Team;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   //haalt alle id's op (en naam voor de driver) uit andere tabellen
        $users = User::pluck('id')->toArray();
        $races = Race::pluck('id')->toArray();
        $tires = Tire::pluck('id')->toArray();
        $teams = Team::pluck('id')->toArray();
        $names = User::pluck('name')->toArray();

        $count = count($users); //tel het aantal users

        for ($i = 0; $i < $count; $i++) { //maak voor alle users een random scorelijst aan
            \App\Models\Score::factory()->create([
                'user_id' => $users[$i],
                'race_id' => $this->getRandomId($races),
                'tire_id' => $this->getRandomId($tires),
                'team_id' => $this->getRandomId($teams),
                'driver' => $names[$i],
            ]);
        }
    }

    private function getRandomId(array $ids): int
    {
        return $ids[array_rand($ids)];
    }
}

