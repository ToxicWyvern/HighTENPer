<?php

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LeaderboardController extends Controller
{
    public function updateRaceStatus()
    {
        // Get the current date and time
        $currentDate = Carbon::now();

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

        return response()->json(['message' => 'Race status updated successfully']);
    }
}

