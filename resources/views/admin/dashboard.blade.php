@extends('layouts.app')

@section('content')
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
