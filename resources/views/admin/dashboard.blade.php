@extends('layouts.app')

@section('content')
<section class="dashboard-admin-container">
    @if(auth()->check() && auth()->user()->admin)
        {{-- Admin Dashboard content --}}
        <h1 class="dashboard-admin-heading">ADMIN DASHBOARD</h1>
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
