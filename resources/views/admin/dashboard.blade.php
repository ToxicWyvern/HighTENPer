{{-- resources/views/admin/dashboard.blade.php --}}

@extends('layouts.app')
<html>
</html>
@section('content')
    @if(auth()->check() && auth()->user()->admin)
{{--         Admin Dashboard content--}}
        <h1>Welcome to the Admin Dashboard!</h1>
<<<<<<< HEAD
    @else
         Unauthorized message
        <p>You are not authorized to access this page.</p>
=======

    @else
         Unauthorized message
        <p>You are not authorized to access this page.</p>

>>>>>>> 8fd7b8e7b7fc354e4afac39713d9c939bc43734e
    @endif
@endsection
