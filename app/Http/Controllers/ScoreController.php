<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;
use App\Models\Race;
use App\Models\Team;
use App\Models\Tire;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ScoreController extends Controller
{
    /**
     * Toont de beste 10 scores van alle gebruikers op de homepagina.
     */
    public function home()
    {
        // Get the ID of the currently active race
        $activeRaceId = Race::where('active', true)->value('id');

        // Fetch the best ten scores for the active race
        $getBestTenScores = Score::whereHas('race', function ($query) use ($activeRaceId) {
            $query->where('id', $activeRaceId);
        })
            ->orderBy('best', 'asc')
            ->take(10)
            ->get();
        foreach ($getBestTenScores as $score) {
            $trophies = $score->user->trophies ?? 0;
            $colors = ['black','#f7cac9','#b87333','#878681','#3d2856','#85c1c4','#0f52ba', '#e0115f', '#50c878', '#89E9FF'];
            $colorIndex = floor($trophies / 10) % count($colors);
            $score->color = $colors[$colorIndex];
        }

        return $getBestTenScores;
    }

    /**
     * Toont op de dashboardpagina de beste 5 en laatste 5 scores van de ingelogde gebruiker.
     */
    public function dashboard()
    {
        $user = Auth::user();

        $userBestFiveScores = $user->scores()->orderBy('best', 'asc')->take(5)->get();
        $userLastFiveScores = $user->scores()->orderBy('created_at', 'desc')->take(5)->get();

        // Area Chart Logic
        $userScoresForChart = Score::where('user_id', $user->id)->get(['best', 'created_at']);

        $chartData = [];
        foreach ($userScoresForChart as $score) {
            $chartData[] = [
                'x' => $score->created_at->toDateTimeString(), // Adjust the format as needed
                'y' => $score->best,
            ];
        }

        return view('dashboard', [
            'userBestFiveScores' => $userBestFiveScores,
            'userLastFiveScores' => $userLastFiveScores,
            'chartData' => $chartData,
        ]);
    }


    public function showAreaChart()
    {
        $userScores = Score::where('user_id', auth()->user()->id)
            ->get(['best', 'created_at']);

        $chartData = [];
        foreach ($userScores as $score) {
            $chartData[] = [
                'x' => $score->created_at->format('Y-m-d H:i:s'),
                'y' => $score->best,
            ];
        }

        return view('dashboard', compact('chartData'));
    }
    /**
     * Toont het formulier voor het uploaden van scores met lijsten van races, teams en banden.
     */
    public function showScoreForm()
    {
        $races = Race::all();
        $teams = Team::all();
        $tires = Tire::all();
        return view('leaderboards.uploadLeaderboard', ['races' => $races, 'teams' => $teams, 'tires' => $tires]);
    }

    /**
     * Verwerkt en slaat de ingediende score op met bijbehorende details.
     */
    public function submitScore(Request $request)
    {
        $validator = $request->validate([
            'race' => 'required',
            'best' => 'required',
            'team' => 'required',
            'tires' => 'required',
            'scoreImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();

        $score = new Score([
            'user_id' => $user->id,
            'race_id' => $request->input('race'),
            'tire_id' => $request->input('tires'),
            'team_id' => $request->input('team'),
            'driver' => $user->name,
            'best' => $request->input('best'),
            'verified' => false,
        ]);

        if ($request->hasFile('scoreImage')) {
            $scoreImage = $request->file('scoreImage')->store('proofs', 'public');
            $score->scoreImage = $scoreImage;
        }

        $score->save();

        return view('successful');

    }

    /**
     * De functie "showScoresForm" haalt gegevens op uit de database en geeft deze door aan een
     * weergave voor het weergeven van scoreborden.
     * 
     * return een weergave met de naam 'leaderboards.boards' en het doorgeven van de variabelen
     * ,  en  aan de weergave.
     */
    public function showScoresForm()
    {
        $races = DB::table('races')->pluck('name', 'id');
        $teams = DB::table('teams')->pluck('team', 'id');
        $tires = DB::table('tires')->pluck('tire', 'id');

        return view('leaderboards.boards', compact('races', 'teams', 'tires'));
    }

    /**
     * De functie verwerkt scores voor een specifieke race en retourneert een weergave met de
     * klassementgegevens.
     * 
     * param Request request De parameter  is een exemplaar van de klasse Request, die wordt
     * gebruikt om gegevens uit het HTTP-verzoek op te halen. In dit geval wordt het gebruikt om de
     * 'race_id'-invoer uit het verzoek op te halen.
     * 
     * return een weergave genaamd 'leaderboards.boards' met de volgende variabelen: 'races', 'teams',
     * 'banden', 'bestTenScores' en 'selectedRaceName'.
     */
    public function processScores(Request $request)
    {
        $raceId = $request->input('race_id');

        $selectedRaceName = DB::table('races')->where('id', $raceId)->value('name');

        $races = DB::table('races')->pluck('name', 'id');
        $teams = DB::table('teams')->pluck('team', 'id');
        $tires = DB::table('tires')->pluck('tire', 'id');

        $bestTenScores = Score::select('driver', 'best', 'team_id', 'tire_id', 'verified', 'user_id')
            ->with('user')
            ->where('race_id', $raceId)
            ->orderBy('best', 'asc')
            ->get();

        foreach ($bestTenScores as $score) {
            $trophies = $score->user->trophies ?? 0;
            $colors = ['black','#f7cac9','#b87333','#878681','#3d2856','#85c1c4','#0f52ba', '#e0115f', '#50c878', '#89E9FF'];
            $colorIndex = floor($trophies / 10) % count($colors);
            $score->color = $colors[$colorIndex];
        }

        return view('leaderboards.boards', compact('races', 'teams', 'tires', 'bestTenScores', 'selectedRaceName'));
    }
}
