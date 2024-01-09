<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Race;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LeaderboardController extends Controller
{
    public function __construct()
    {
        // Run the updateRaceStatus method before each request
        $this->middleware(function ($request, $next) {
            $this->updateRaceStatus();
            return $next($request);
        });
    }

    public function index()
    {
        // Get the currently active race
        $activeRace = Race::where('active', true)->first();

        // Use the existing logic to display the leaderboard data in the view
        return view('welcome', [
            'activeRace' => $activeRace,
            'getBestTenScores' => app(\App\Http\Controllers\ScoreController::class)->welcome(),
        ]);
    }

    // Add other methods related to the leaderboard controller as needed

    private function updateRaceStatus()
    {
        // Get the current date and time
        $currentDate = Carbon::now();

        //to test other dates, use:
        //$currentDate = now()->setYear(2024)->setMonth(4)->setDay(4)->setHour(12)->setMinute(0)->setSecond(0);

        // Deactivate all races that have a date on or before the current date
        DB::table('races')
            ->where('date', '<=', $currentDate)
            ->update(['active' => false]);

        // Find the race with the earliest future date and activate it
        DB::table('races')
            ->where('date', '>', $currentDate)
            ->orderBy('date', 'asc')
            ->limit(1)
            ->update(['active' => true]);
    }
}

