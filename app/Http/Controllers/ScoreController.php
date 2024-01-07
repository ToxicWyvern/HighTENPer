<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;
use App\Models\Race;
use App\Models\Team;
use App\Models\Tire;

class ScoreController extends Controller
{
    /**
     * Toont de beste 10 scores van alle gebruikers op de welkomstpagina.
     */
    public function welcome()
    {
        $bestTenScores = Score::orderBy('best', 'asc')->take(10)->get();
        return view('welcome', compact('bestTenScores'));
    }

    /**
     * Toont op de homepagina de beste 5 en laatste 5 scores van de ingelogde gebruiker.
     */
    public function home()
    {
        $user = Auth::user();
        $userBestFiveScores = $user->scores()->orderBy('best', 'asc')->take(5)->get();
        $userLastFiveScores = $user->scores()->orderBy('created_at', 'desc')->take(5)->get();
        return view('home', [
            'userBestFiveScores' => $userBestFiveScores,
            'userLastFiveScores' => $userLastFiveScores,
        ]);
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
     * Toont beschikbare races voor selectie op het admin-dashboard. (WORDT NOG AAN GEWERKT!)
     */
    public function SelectRace()
    {
        $races = Race::all();
        return view('admin.dashboard', ['races' => $races]);
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
}
