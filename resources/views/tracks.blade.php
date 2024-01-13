@extends('layouts.app')

@section('content')

<h1>Tracks</h1>

    @foreach($tracks as $track)
        <p>{{$track->name}} | {{$track->date}}</p>
    @endforeach


@endsection
