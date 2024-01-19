
@extends('layouts.app')
 

<!-- /* De `@section('content')` richtlijn wordt gebruikt om een sectie met inhoud in een Blade-sjabloon te
definiëren. In dit geval definieert het de inhoudssectie van de sjabloon. */ -->
@section('content')
<section class="dashboard-admin-container">
   <!-- dit checkt of user als hij perongeluk naar de admin page gaat -->
    @if(auth()->check() && auth()->user()->admin)
        {{-- Admin Dashboard content --}}
        <h1 class="dashboard-admin-heading">Welkom bij het Admin Dashboard, {{ Auth::user()->name }}!</h1>
        {{-- Button to Manage Users --}}
    <div class="dashboard-admin">
        <div class="dashboard-admin-username">
            <h2>{{ auth::user()->name }}</h2>
        </div>
        <div class="dashboard-admin-cta">
            <a href="{{ route('admin.manageUsers') }}" class="btn btn-primary">Beheer Gebruikers</a>
            <a href="{{ route('admin.manageLeaderboards') }}" class="btn btn-primary">Beheer Leaderboards</a>
        </div>
    </div>

    @else
        {{-- Unauthorized message --}}
        <p>Je bent niet geautoriseerd om je op deze pagina te bevinden. </p>
    @endif
</section>

@endsection
