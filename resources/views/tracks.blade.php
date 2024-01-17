@extends('layouts.app')

@section('content')
<div class="tracks-container">
    <h1>Tracks</h1>
    @foreach($tracks as $track)
    <div class="tracks">
      <div class="tracks-location"><img src="{{ $track->flag }}" class="tracks-location-image" alt="{{ $track->name }}" ></div>
      <div class="tracks-name">{{$track->name}} </div>
        <div class="tracks-date">{{ \Carbon\Carbon::parse($track->date)->format('d-m-Y') }}</div>
      <div class="tracks-image"><img src="{{ $track->image }}" alt="{{ $track->name }}"></div>
    </div>
    @endforeach
  </div>
@endsection
