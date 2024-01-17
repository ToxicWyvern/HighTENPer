<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;
use Illuminate\Support\Facades\Auth;
use App\Models\Race;
use App\Models\Team;
use App\Models\Tire;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
        // Fetch the users from the database
        $users = User::all();

        // Return the view with the users
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

    public function blockUser($id)
    {
        if (auth()->check() && auth()->user()->admin) {
            $user = User::findOrFail($id);

            // Change user's password to something random
            $newPassword = Str::random(12); // You may need to import Str class
            $user->password = Hash::make($newPassword);
            $user->save();

            return redirect()->route('admin.manageUsers')->with('success', 'User blocked successfully.');

        } else {
            abort(403, 'Unauthorized.');
        }
    }


    public function manageLeaderboards()
{
    if (auth()->check() && auth()->user()->admin) {
        // Fetch only the scores that are not verified
        $scores = Score::where('verified', false)->get();

        return view('admin.manageLeaderboards', compact('scores'));
    } else {
        abort(403, 'Unauthorized.');
    }
}

    public function verifyScore(Score $score)
    {
        // Check if the authenticated user is an admin
        if (Auth::check() && Auth::user()->admin) {
            // Retrieve the user associated with the score
            $user = $score->user;

            // Perform the verification logic
            $score->update(['verified' => true]);

            // Check if the user is retrieved
            if ($user) {
                $user->increment('trophies');
            }

            return redirect()->route('admin.manageLeaderboards')->with('success', 'Score verified successfully');
        } else {
            // If the user is not an admin, return unauthorized response
            abort(403, 'Unauthorized.');
        }
    }


    public function rejectScore(Score $score)
    {
        // Check if the authenticated user is an admin
        if (Auth::check() && Auth::user()->admin) {
            // Perform the rejection logic
            $score->delete(); // You may need different logic based on your requirements

            return redirect()->route('admin.manageLeaderboards')->with('success', 'Score rejected successfully');
        } else {
            // If the user is not an admin, return unauthorized response
            abort(403, 'Unauthorized.');
        }
    }
}

