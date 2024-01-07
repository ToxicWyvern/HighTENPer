<?php

namespace App\Http\Controllers;

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
    }
}
