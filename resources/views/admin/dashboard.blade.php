
@extends('layouts.app')
 

<!-- /* De `@section('content')` richtlijn wordt gebruikt om een sectie met inhoud in een Blade-sjabloon te
definiëren. In dit geval definieert het de inhoudssectie van de sjabloon. */ -->
@section('content')
   <!-- dit checkt of user als hij perongeluk naar de admin page gaat -->
    @if(auth()->check() && auth()->user()->admin)
        {{-- Admin Dashboard content --}}
        <h1>Welkom bij het Admin Dashboard, {{ Auth::user()->name }}!</h1>

        {{-- Button to Manage Users --}}
        <a href="{{ route('admin.manageUsers') }}" class="btn btn-primary">Beheer Gebruikers</a>

        <a href="{{ route('admin.manageLeaderboards') }}" class="btn btn-primary">Beheer Leaderboards</a>

    @else
        {{-- Unauthorized message --}}
        <p>Je bent niet geautoriseerd om je op deze pagina te bevinden. </p>
    @endif
@endsection
