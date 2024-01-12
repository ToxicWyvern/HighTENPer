<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;
use App\Models\Race;
use App\Models\Team;
use App\Models\Tire;
use App\Models\User;


class AdminController extends Controller
{
    public function dashboard()
    {
        if (Auth::check() && Auth::user()->admin) {
            return view('admin.dashboard');
        } else {
            abort(403, 'Unauthorized.');
        }
    }

    public function manageUsers()
    {
        if (auth()->check() && auth()->user()->admin) {
            $users = User::all();
            return view('admin.manageUsers' , compact('users'));
        } else {
            abort(403, 'Unauthorized.');
        }
        
    }

    public function manageLeaderboards()
    {
        if (auth()->check() && auth()->user()->admin) {
            return view('admin.manageLeaderboards');
        } else {
            abort(403, 'Unauthorized.');
        }
    }

public function deleteUser($id)
{
    if (auth()->check() && auth()->user()->admin) {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.manageUsers')->with('success', 'User deleted successfully.');
    } else {
        abort(403, 'Unauthorized.');
    }
}
public function approveTime($id)
{
    if (auth()->check() && auth()->user()->admin) {
        $score = Score::findOrFail($id);
        
        // Add your logic to check if the user's time is valid
        if ($score->isValidTime()) {
            $score->approve();
            return redirect()->route('admin.manageLeaderboards')->with('success', 'Time approved successfully.');
        } else {
            return redirect()->route('admin.manageLeaderboards')->with('error', 'Invalid time. Unable to approve.');
        }
    } else {
        abort(403, 'Unauthorized.');
    }
}
public function manageScores()
{
    if (auth()->check() && auth()->user()->admin) {
        $scores = Score::all();
        return view('admin.manageLeaderboards', ['scores' => $scores]);
    } else {
        abort(403, 'Unauthorized.');
    }
}
    
}

