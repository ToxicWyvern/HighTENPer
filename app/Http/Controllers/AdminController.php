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
            return view('admin.manageUsers', compact('users'));
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


    public function manageLeaderboards()
    {
        if (auth()->check() && auth()->user()->admin) {
            $scores = score::all();

            return view('admin.manageLeaderboards', compact('scores'));
        } else {
            abort(403, 'Unauthorized.');
        }
    }
    public function approveLeaderboard($id)
    {
        if (auth()->check() && auth()->user()->admin) {
            $scores = score::findOrFail($id);
            // Perform logic to approve the leaderboard entry (update the approved column, for example)

            return redirect()->route('admin.manageLeaderboards')->with('success', 'Leaderboard entry approved successfully.');
        } else {
            abort(403, 'Unauthorized.');
        }
    }
}

