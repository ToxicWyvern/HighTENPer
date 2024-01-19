<?php
/* De klasse CoureurController is verantwoordelijk voor het ophalen en weergeven van informatie over
wielrenners en hun teams. */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coureur;
use App\Models\Team;

class CoureurController extends Controller
{
    /**
     * De functie "showCoureurDropdown" haalt alle coureurs en teams op uit de database en stelt een
     * standaardwaarde in voor de coureur, en retourneert vervolgens een weergave met de opgehaalde
     * gegevens.
     * 
     * return een weergave genaamd 'coureurs' en waarbij drie variabelen aan de weergave worden
     * doorgegeven: 'coureurs', 'teams' en 'coureur'.
     */
    public function showCoureurDropdown()
    {
        $coureurs = Coureur::all();
        $teams = Team::pluck('team', 'id');
    //Stel een standaardwaarde in voor $ coureur, u kunt deze wijzigen op basis van uw standaardgedrag
        $coureur = Coureur::first();

        return view('coureurs', compact('coureurs', 'teams', 'coureur'));
    }

    /**
     * De functie haalt informatie op over een geselecteerde coureur (wielrenner) en hun team en geeft
     * deze samen met andere gegevens door aan een weergave.
     * 
     * param Request request De parameter  is een exemplaar van de klasse Request, die een
     * HTTP-verzoek vertegenwoordigt. Het bevat informatie over het verzoek, zoals de verzoekmethode,
     * headers en invoergegevens.
     * 
     * return een weergave genaamd 'coureurs' met de volgende variabelen: 'coureurs', 'teams',
     * 'selectedCoureurId' en 'coureur'.
     */
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
