<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coureur;
use App\Models\Team;

class CoureurController extends Controller
{
    public function showCoureurDropdown()
    {
        $coureurs = Coureur::all();
        $teams = Team::pluck('team', 'id');

        // Set a default value for $coureur, you can change this based on your default behavior
        $coureur = Coureur::first();

        return view('coureurs', compact('coureurs', 'teams', 'coureur'));
    }

    public function showSelectedCoureur(Request $request)
    {
        $selectedCoureurId = $request->input('coureur_id');
        \Illuminate\Support\Facades\Log::info('Selected Coureur ID: ' . $selectedCoureurId);

        $coureur = Coureur::select('name', 'photo', 'bio', 'team_id')
            ->with('team:id,team')
            ->find($selectedCoureurId);

        $coureurs = Coureur::all();
        $teams = Team::pluck('team', 'id');

        return view('coureurs', compact('coureurs', 'teams', 'selectedCoureurId', 'coureur'));
    }

}
