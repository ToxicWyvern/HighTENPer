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
                <h3 style="color: white">Profiel Bewerken</h3>
            <form method="POST" action="{{ route('profile.updateProfile') }}" enctype="multipart/form-data">
                @csrf

                <!-- Geef de huidige profielfoto weer -->
                @if ($user->profileImage)
                    <img src="storage/{{ $user->profileImage }}" alt="Profile Photo" style="max-width: 150px; margin-bottom: 10px;">
                @else
                    <p>Geen Profielfoto Beschikbaar</p>
                @endif

                <!-- Laat de gebruiker een nieuwe profielfoto kiezen -->
                <div class="choosefile">
                    <label for="profileImages">Kies een nieuwe profielfoto:</label> <!-- Change this to 'profile_photo' -->
                    <input id="profileImages" type="file" class="form-control" name="profileImages" accept="image/*"> <!-- Change this to 'profile_photo' -->
                </div>

                <!-- Laat de gebruiker een nieuwe naam kiezen -->
                <label for="name">Naam:</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required>

                <!-- Laat de gebruiker een nieuwe email kiezen -->
                <label for="email">Email:</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required>

                <!-- Wachtwoord wijzigen sectie -->
                <label for="current_password">Huidig Wachtwoord:</label>
                <input type="password" name="current_password" required>

                <label for="new_password">Nieuw Wachtwoord:</label>
                <input type="password" name="new_password">

                <label for="new_password_confirmation">Nieuw Wachtwoord Herhalen:</label>
                <input type="password" name="new_password_confirmation">

                <button type="submit" class="btn-register">Werk Profiel Bij</button>
            </form>
            </div>
        </section>

    </div>
@endsection

