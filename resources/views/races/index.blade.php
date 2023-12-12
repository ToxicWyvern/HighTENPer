@extends('layouts.app')

@section('content')
    <h1> Races</h1>
    @foreach($races as $race)
        <p>{{$race->name}} | {{$race->length}}</p>
    @endforeach
@endsection
