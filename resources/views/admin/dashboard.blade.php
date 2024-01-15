{{-- resources/views/admin/dashboard.blade.php --}}

@extends('layouts.app')
<html>
</html>
@section('content')
    @if(auth()->check() && auth()->user()->admin)
{{--         Admin Dashboard content--}}
        <h1>Welcome to the Admin Dashboard!</h1>

    @else
         Unauthorized message
        <p>You are not authorized to access this page.</p>

    @endif
@endsection

<!-- test -->
