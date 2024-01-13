@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Profile</h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

      

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')

            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
            <!-- Display the current profile photo -->
           

            <!-- Password change section -->
            <label for="current_password">Current Password:</label>
            <input type="password" name="current_password" required>

            <label for="new_password">New Password:</label>
            <input type="password" name="new_password">

            <label for="new_password_confirmation">Confirm New Password:</label>
            <input type="password" name="new_password_confirmation">

            <!-- Allow user to choose a new profile photo -->
            @if ($user->profile_photo_path)
                <img src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="Profile Photo" style="max-width: 150px; margin-bottom: 10px;">
            @else
                <p>No profile photo available</p>
            @endif
            <div class="choosefile">
                <label for="profileImage">Choose a new profile photo:</label>
                <input id="profileImage" type="file" class="form-control" name="profileImage" accept="image/*">
            </div>

            <!-- Add more fields as needed -->

            <button type="submit">Update Profile</button>
        </form>
    </div>
@endsection
