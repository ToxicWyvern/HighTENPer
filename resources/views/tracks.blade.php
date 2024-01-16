@extends('layouts.app')

@section('content')
<div class="tracks-container">
    <h1>Tracks</h1>
    @foreach($tracks as $track)
    <div class="tracks">
      <div class="tracks-name">{{$track->name}} </div>
      <div class="tracks-date">{{$track->date}}</div>
    </div>
    @endforeach
  </div>


@endsection
