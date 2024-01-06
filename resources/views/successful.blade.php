@extends('layouts.app')

@section('content')
    <h1>Successfully Uploaded!</h1>
    <h5>The entered score is still being considered.<br>
        This will take several working days.<br>
        For now you will see your score in bold.</h5>
<a class="button" href="{{ url('/leaderboard') }}">See the main leaderboard</a>
@endsection
