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

    public function manageUsers(Request $request)
    {
        if (auth()->check() && auth()->user()->admin) {
            // Get the search query from the request
            $search = $request->input('search');

            // Fetch the users from the database based on the search query
            $users = User::where('name', 'like', "%$search%")->get();

            // Return the view with the filtered users
            return view('admin.manageUsers', compact('users'));
        } else {
            abort(403, 'Unauthorized.');
        }
    }
    public function deleteUser($id)
    {
        if (auth()->check() && auth()->user()->admin) {
            $user = User::findOrFail($id);

            // Delete associated scores
            $user->scores()->delete();

            // Delete the user
            $user->delete();

            return redirect()->route('admin.manageUsers')->with('success', 'User and associated scores deleted successfully.');
        } else {
            abort(403, 'Unauthorized.');
        }
    }

    public function toggleBlockUser($id)
    {
        if (auth()->check() && auth()->user()->admin) {
            $user = User::findOrFail($id);

            if ($user->blocked) {
                // Unblock user
                $user->blocked = false;
                $user->password = Hash::make('12345678');
                $message = 'User unblocked successfully.';
            } else {
                // Block user
                $newPassword = Str::random(12);
                $user->blocked = true;
                $user->password = Hash::make($newPassword);
                $message = 'User blocked successfully.';
            }

            // Save the changes to the user
            $user->save();

            return redirect()->route('admin.manageUsers')->with('success', $message);
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

            return redirect()->route('admin.manageLeaderboards')->with('success', '<span style="color: white;">Score verified successfully</span>');

        } else {
            // If the user is not an admin, return unauthorized response
            abort(403, 'Unauthorized.');
        }
    }


    public function rejectScore($id)
    {
        // Check if the authenticated user is an admin
        if (Auth::check() && Auth::user()->admin) {
            // Find the score by ID
            $score = Score::find($id);

            // Check if the score exists
            if ($score) {
                // Delete the score
                $score->delete();

                return redirect()->route('admin.manageLeaderboards')->with('success', 'Score deleted successfully');
            } else {
                return redirect()->route('admin.manageLeaderboards')->with('error', 'Score not found');
            }
        } else {
            // If the user is not an admin, return unauthorized response
            abort(403, 'Unauthorized.');
        }
    }
}

