<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class FriendController extends Controller
{
    /**
     * De functie `showAddFriends` haalt een lijst met gebruikers uit de database, exclusief de
     * geauthenticeerde gebruiker, en filtert de lijst op basis van een zoekopdracht.
     * 
     * return een weergave genaamd 'profile.addFriends' met de variabelen 'users' en 'followedUsers'.
     */
    public function showAddFriends()
    {
        $authUserId = auth()->user()->id;
        $search = request('search');

        $query = DB::table('users')->where('id', '!=', $authUserId);

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $users = $query->get();
        $followedUsers = DB::table('follows')->where('user_id', $authUserId)->pluck('follows')->toArray();

        return view('profile.addFriends', ['users' => $users, 'followedUsers' => $followedUsers]);
    }

    /**
     * De functie schakelt de volgstatus van een gebruiker om door te controleren of de gebruiker al
     * volgt en dienovereenkomstig te ontvolgen of te volgen.
     * 
     * request De parameter  is een exemplaar van de klasse Request, die een
     * HTTP-verzoek vertegenwoordigt. Het bevat informatie over het verzoek, zoals de verzoekmethode,
     * headers en invoergegevens.
     * 
     * return een omleiding naar de 'addFriends'-route.
     */
    public function toggleFollowUser(Request $request)
    {
        $userId = $request->input('user_id');
        $authUserId = auth()->user()->id;

        $existingFollow = DB::table('follows')->where('user_id', $authUserId)->where('follows', $userId)->first();

        if ($existingFollow) {
            // User is already following, so unfollow
            DB::table('follows')->where('user_id', $authUserId)->where('follows', $userId)->delete();
        } else {
            // User is not following, so follow
            DB::table('follows')->insert([
                'user_id' => $authUserId,
                'follows' => $userId,
            ]);
        }

        return redirect()->route('addFriends');
    }
}
