<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\score;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Rules\CurrentPasswordRule;
use App\Http\Controllers\RegisterController;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('profile.profile');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProfileRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editProfile()
{
    $user = Auth::user();

    return view('profile.editProfile', compact('user'));
}


public function updateProfile(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'profileImages' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        'current_password' => 'required_with:new_password',
        'new_password' => 'nullable|string|min:8|confirmed',
    ]);

    

        // Update user information
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'profileImages' => $request->profileImages, // Change this to 'profile_photo'
        ]);
        
        // Handle profile photo upload
        if ($request->hasFile('profileImages')) {
            $profilePhoto = $request->file('profileImages');
            $photoPath = $profilePhoto->store('profileImages', 'public');
        
            // Save the photo path to the user's profile
            $user->profileImage = $photoPath;
            $user->save();
        }

        // Change password if provided
        if ($request->filled('new_password')) {
            $user->update(['password' => Hash::make($request->new_password)]);
        }

        return redirect()->route('profile.editProfile')->with('success', 'Profile updated successfully');
    } 

        
    }












/**{
     * Remove the specified resource from storage.
     */
    
    //public function destroy(Profile $profile)
  //  {
        //
   // }

