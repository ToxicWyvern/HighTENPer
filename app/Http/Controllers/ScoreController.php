<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Score;
use Illuminate\Support\Facades\Auth;

class ScoreController extends Controller
{
    public function welcome()
    {
        // Fetch the best 10 scores from all users
        $bestTenScores = Score::orderBy('best', 'asc')->take(5)->get();

        // Output a message if $bestTenScores is empty
        if ($bestTenScores->isEmpty()) {
            dd('No scores found.'); // This will stop execution and display the message
        }

        // Pass the data to the welcome view
        return view('welcome')->with('bestTenScores', $bestTenScores);
    }

    public function home()
    {
        // Get the currently logged-in user
        $user = Auth::user();

        //Fetch the best 5 scores of the logged-in user
        $userBestFiveScores = $user->scores()->orderBy('best', 'asc')->take(3)->get();

        // Fetch the last 5 scores uploaded by the logged-in user
        $userLastFiveScores = $user->scores()->orderBy('created_at', 'desc')->take(3)->get();

        // Pass the data to the home view
        return view('home', [
            'userBestFiveScores' => $userBestFiveScores,
            'userLastFiveScores' => $userLastFiveScores,
        ]);
=======
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
>>>>>>> 8fd7b8e7b7fc354e4afac39713d9c939bc43734e
    }
}
