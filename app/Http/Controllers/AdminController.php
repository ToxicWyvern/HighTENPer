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
            return view('admin.manageUsers');
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
}

