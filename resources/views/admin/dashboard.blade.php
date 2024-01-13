@extends('layouts.app')

@section('content')
    @if(auth()->check() && auth()->user()->admin)
        {{-- Admin Dashboard content --}}
        <h1>Welcome to the Admin Dashboard, {{ Auth::user()->name }}!</h1>
        
        {{-- Button to Manage Users --}}
        <a href="{{ route('admin.manageUsers') }}" class="btn btn-primary">Manage Users</a>

    @else
        {{-- Unauthorized message --}}
        <p>You are not authorized to access this page.</p>
    @endif
@endsection
