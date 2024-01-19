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
 
     /**
     * De functie controleert of de gebruiker is geverifieerd en een beheerder is, en als dat het geval
     * is, wordt de weergave van het beheerdersdashboard geretourneerd, anders wordt er een fout 403
     * Ongeautoriseerd gegenereerd.
     * 
     * return Als de gebruiker is geverifieerd en de rol "admin" heeft, retourneert de functie de
     * weergave "admin.dashboard". Anders wordt het verzoek afgebroken met een 403-foutmelding met de
     * melding 'Ongeautoriseerd'.
     */
    public function dashboard()
    {
        if (Auth::check() && Auth::user()->admin) {
            return view('admin.dashboard');
        } else {
            abort(403, 'Unauthorized.');
        }
    }


    /**
     * De functie "manageUsers" controleert of de geverifieerde gebruiker een beheerder is en
     * retourneert een weergave met alle gebruikers als dit waar is, anders wordt de functie afgebroken
     * met een 403-fout.
     * 
     * return een weergave genaamd 'admin.manageUsers' waarbij de gebruikersgegevens worden
     * doorgegeven als een variabele met de naam 'users'.
     */
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
    /**
     * De functie deleteUser verwijdert een gebruiker als de geverifieerde gebruiker een beheerder is,
     * anders retourneert deze een ongeautoriseerde fout.
     * 
     * param id De id-parameter vertegenwoordigt de unieke identificatie van de gebruiker die moet
     * worden verwijderd.
     * 
     * return een omleiding naar de route 'admin.manageUsers' met een succesbericht als de gebruiker
     * is geverifieerd en een beheerder is. Als de gebruiker niet is geverifieerd of geen beheerder is,
     * retourneert deze een 403-fout met het bericht 'Niet geautoriseerd'.
     */
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

    /**
     * De functie `toggleBlockUser` wordt gebruikt om een gebruiker te blokkeren of deblokkeren op
     * basis van zijn of haar ID, en werkt ook het wachtwoord van de gebruiker dienovereenkomstig bij.
     * 
     * param id De parameter "id" is de unieke identificatie van de gebruiker die moet worden
     * geblokkeerd of gedeblokkeerd.
     * 
     * return een omleidingsreactie op de route 'admin.manageUsers' met een succesbericht.
     */
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

    /**
     * De functie "ManageLeaderboards" controleert of de gebruiker een beheerder is en haalt
     * niet-geverifieerde scores op die in het beheerderspaneel moeten worden weergegeven, anders
     * retourneert deze een ongeautoriseerde fout.
     * 
     * return Als de gebruiker is geverifieerd en een beheerder is, retourneert de functie de weergave
     * 'admin.manageLeaderboards' met de variabele 'scores' eraan doorgegeven. Als de gebruiker niet is
     * geverifieerd of geen beheerder is, wordt de functie afgebroken met een 403-foutmelding.
     */
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

   /**
    * Deze functie verifieert een score en werkt het aantal trofeeën van de gekoppelde gebruiker bij
    * als de geverifieerde gebruiker een beheerder is.
    * 
    * param Score score De parameter `` is een instantie van de klasse `Score`. Het
    * vertegenwoordigt een scoreobject dat moet worden geverifieerd.
    * 
    * return een omleidingsreactie op de route "admin.manageLeaderboards" met een succesbericht.
    */
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


    /**
     * De functie wijst een score af als de geverifieerde gebruiker een beheerder is, anders
     * retourneert deze een ongeautoriseerd antwoord.
     * 
     * param Score score De parameter `` is een instantie van de klasse `Score`. Het
     * vertegenwoordigt een scoreobject dat moet worden afgewezen.
     * 
     * return een omleidingsreactie op de route "admin.manageLeaderboards" met een
     * succes-flashbericht.
     */
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

