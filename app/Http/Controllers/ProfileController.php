<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Rules\CurrentPasswordRule;


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
    public function edit()
    {
        $user = Auth::user();
        return view('profile.editProfile', compact('user'));
    }

    public function update(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'profile_photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        'current_password' => 'required_with:new_password',
        'new_password' => 'nullable|string|min:8|confirmed',
    ]);

    // Validate current password
    if ($request->filled('current_password') && !Hash::check($request->current_password, $user->password)) {
        return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.'])->withInput();
    }

    // Update user information
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    // Handle profile photo upload
    if ($request->hasFile('profile_photo')) {
        $profilePhoto = $request->file('profile_photo');
        $photoPath = $profilePhoto->store('profile_photos', 'public');

        // Save the photo path to the user's profile
        $user->profile_photo_path = $photoPath;
        $user->save();
    }

    // Change password if provided
    if ($request->filled('new_password')) {
        $user->update(['password' => Hash::make($request->new_password)]);
    }

    return redirect()->route('profile.editProfile')->with('success', 'Profile updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
