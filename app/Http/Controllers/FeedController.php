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
use App\Models\Follow;

class FeedController extends Controller
{
    public function feed()
    {
        $authenticatedUserId = auth()->user()->id;

        $followedUserIds = Follow::where('user_id', $authenticatedUserId)->pluck('follows');

        $followedUsersWithScores = User::whereIn('id', $followedUserIds)
            ->with(['scores.race' => function ($query) {
                $query->select('id', 'name');
            }])
            ->get();

        foreach ($followedUsersWithScores as $user) {
            $user->scores = $user->scores->sortByDesc('created_at');
        }

        return view('profile.feed', [
            'followedUsersWithScores' => $followedUsersWithScores,
        ]);
    }
}
