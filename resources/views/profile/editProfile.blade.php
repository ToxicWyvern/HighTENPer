@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <section class="editProfile-container">
            <div class="editprofile">
                <h3>Profiel Bewerken</h3>
            <form method="POST" action="{{ route('profile.updateProfile') }}" enctype="multipart/form-data">
                @csrf

                <!-- Display the current profile photo -->
                @if ($user->profileImage)
                    <img src="storage/{{ $user->profileImage }}" alt="Profile Photo" style="max-width: 150px; margin-bottom: 10px;">
                @else
                    <p>Geen Profielfoto Beschikbaar</p>
                @endif

                <label for="name">Naam:</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required>

                <label for="email">Email:</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required>

                <!-- Password change section -->
                <label for="current_password">Huidig Wachtwoord:</label>
                <input type="password" name="current_password" required>

                <label for="new_password">Nieuw Wachtwoord:</label>
                <input type="password" name="new_password">

                <label for="new_password_confirmation">Nieuw Wachtwoord Herhalen:</label>
                <input type="password" name="new_password_confirmation">

                <!-- Allow the user to choose a new profile photo -->
                <div class="choosefile">
                <label for="profileImages">Kies een nieuwe profielfoto:</label> <!-- Change this to 'profile_photo' -->
                <input id="profileImages" type="file" class="form-control" name="profileImages" accept="image/*"> <!-- Change this to 'profile_photo' -->
                    </div>
                <!-- Add more fields as needed -->

                <button type="submit" class="btn-register">Werk Profiel Bij</button>
            </form>
            </div>
        </section>

    </div>
@endsection

