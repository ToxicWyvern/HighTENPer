<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;
use App\Models\Race;
use App\Models\team;
use App\Models\tire;

class ScoreController extends Controller
{
    public function welcome()
    {
        // Fetch the best 10 scores from all users
        $bestTenScores = Score::orderBy('best', 'asc')->take(10)->get();

        // Output a message if $bestTenScores is empty
        if ($bestTenScores->isEmpty()) {
            dd('No scores found.'); // This will stop execution and display the message
        }
//        $specificRaceId = request()->query('specificRaceId', 1);

        // Pass the data to the welcome view
        return view('welcome', compact('bestTenScores')); //'specificRaceId'
    }

    public function home()
    {
        // Get the currently logged-in user
        $user = Auth::user();

        // Fetch the best 5 scores of the logged-in user
        $userBestFiveScores = $user->scores()->orderBy('best', 'asc')->take(5)->get();

        // Fetch the last 5 scores uploaded by the logged-in user
        $userLastFiveScores = $user->scores()->orderBy('created_at', 'desc')->take(5)->get();

        // Pass the data to the home view
        return view('home', [
            'userBestFiveScores' => $userBestFiveScores,
            'userLastFiveScores' => $userLastFiveScores,
        ]);
    }

    public function showScoreForm()
    {
        $races = Race::all();
        $teams = Team::all();
        $tires = Tire::all();

        return view('leaderboards.uploadLeaderboard', ['races' => $races, 'teams' => $teams, 'tires' => $tires]);
    }
    public function SelectRace()
    {
        $races = Race::all();

        return view('admin.dashboard', ['races' => $races]);
    }
    public function submitScore(Request $request)
    {
        $validator = $request->validate([
            'race' => 'required',
            'best' => 'required', // Make sure 'best' is included in validation
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
            'best' => $request->input('best'), // Set the 'best' field
            'verified' => false,
        ]);

        // Handle file upload
        if ($request->hasFile('scoreImage')) {
            $scoreImage = $request->file('scoreImage')->store('proofs', 'public');
            $score->scoreImage = $scoreImage;
        }

        $score->save();

        return view('successful');
    }
}
