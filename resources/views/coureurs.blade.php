@extends('layouts.app')
@section('content')


<!-- Display the dropdown form -->
<form method="post" action="{{ route('showSelectedCoureur') }}">
    @csrf
    <label for="coureur">Select a Coureur:</label>
    <select name="coureur_id">
        @foreach ($coureurs as $c)
            <option value="{{ $c->id }}">{{ $c->name }}</option>
        @endforeach
    </select>
    <button type="submit">Submit</button>
</form>

<!-- Display selected Coureur details if available -->
@if(isset($coureur))
    <h1>{{ $coureur->name }}</h1>
    <img src="{{ $coureur->photo }}" alt="{{ $coureur->name }} Photo">
    <p>{{ $coureur->bio }}</p>
    <p>Team: {{ $coureur->team->team }}</p>
@endif

@endsection
