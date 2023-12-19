<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadedLeaderboardsController extends Controller
{
    public function index()
    {
        return view('/leaderboards/uploadedLeaderboards');
    }
}
