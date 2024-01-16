@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Profile</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('profile.updateProfile') }}" enctype="multipart/form-data">
            @csrf

            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>

            <!-- Password change section -->
            <label for="current_password">Current Password:</label>
            <input type="password" name="current_password" required>

            <label for="new_password">New Password:</label>
            <input type="password" name="new_password">

            <label for="new_password_confirmation">Confirm New Password:</label>
            <input type="password" name="new_password_confirmation">


            <!-- Display the current profile photo -->
            @if ($user->profile_photo_path)
                <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Profile Photo" style="max-width: 150px; margin-bottom: 10px;">
            @else
                <p>No profile photo available</p>
            @endif


            <!-- Allow the user to choose a new profile photo -->
            <div class="choosefile">
            <label for="profileImages">Choose a new profile photo:</label> <!-- Change this to 'profile_photo' -->
            <input id="profileImages" type="file" class="form-control" name="profileImages" accept="image/*"> <!-- Change this to 'profile_photo' -->
                </div>
            <!-- Add more fields as needed -->

            <button type="submit">Update Profile</button>
        </form>
    </div>
@endsection

