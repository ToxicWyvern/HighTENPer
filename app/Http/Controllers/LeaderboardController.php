<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Race;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LeaderboardController extends Controller
{
    /**
     * De functie __construct voert vóór elk verzoek de methode updateRaceStatus uit.
     * 
     * return De () wordt geretourneerd.
     */
    public function __construct()
    {
        // Run the updateRaceStatus method before each request
        $this->middleware(function ($request, $next) {
            $this->updateRaceStatus();
            return $next($request);
        });
    }

    /**
     * De indexfunctie haalt de momenteel actieve race op en geeft deze samen met de klassementgegevens
     * door aan de startweergave.
     * 
     * return een weergave genaamd 'home' met twee variabelen: 'activeRace' en 'getBestTenScores'.
     */
    public function index()
    {
        // Get the currently active race
        $activeRace = Race::where('active', true)->first();

        // Use the existing logic to display the leaderboard data in the view
        return view('home', [
            'activeRace' => $activeRace,
            'getBestTenScores' => app(\App\Http\Controllers\ScoreController::class)->home(),
        ]);
    }

    

    private function updateRaceStatus()
    {
        // Krijg de huidige datum en tijd
        $currentDate = Carbon::now();

        // Gebruik om andere datums te testen:
        // $ currentDate = now ()-> setyear (2024)-> setmonth (4)-> setday (4)-> sethour (12)-> setminute (0)-> setSecond (0);

        // deactiveer alle races met een datum op of vóór de huidige datum
        DB::table('races')
            ->where('date', '<=', $currentDate)
            ->update(['active' => false]);

        // Vind de race met de vroegste toekomstige datum en activeer deze
        DB::table('races')
            ->where('date', '>', $currentDate)
            ->orderBy('date', 'asc')
            ->limit(1)
            ->update(['active' => true]);
    }
}

