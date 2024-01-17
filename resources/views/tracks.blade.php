@extends('layouts.app')

@section('content')
<div class="tracks-container">
    <h1>Tracks</h1>
    @foreach($tracks as $track)
    <div class="tracks">
        <img src="{{ $track->image }}" alt="{{ $track->name }}">
        <img src="{{ $track->flag }}" alt="{{ $track->name }}">
      <div class="tracks-name">{{$track->name}} </div>
      <div class="tracks-date">{{ \Carbon\Carbon::parse($track->date)->format('d-m-Y') }}</div>
    </div>
    @endforeach
  </div>


@endsection
