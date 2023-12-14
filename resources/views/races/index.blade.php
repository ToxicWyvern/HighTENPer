@extends('layouts.app')

@section('content')
    <h1> Tracks</h1>
    <h4><strong>Name | length (km) | location</strong></h4>
    @foreach($races as $race)
        <p>{{$race->name}} | {{$race->length}} | {{$race->location}}</p>

    @endforeach
@endsection
