<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class FriendController extends Controller
{
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
