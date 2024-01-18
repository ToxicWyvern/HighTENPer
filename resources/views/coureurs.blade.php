@extends('layouts.app')
@section('content')


    <!-- Display the dropdown form -->
    <form method="post" action="{{ route('showSelectedCoureur') }}">
        @csrf
        <div class="coureurs-filter">
            <label for="coureur">Selecteer een Coureur:</label>
            <select name="coureur_id">
                <option value="" selected disabled style="color: #cccccc;">{{ $coureur->name }}</option>
        @foreach ($coureurs as $c)
            <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
            <button type="submit">Zoeken</button>
        </div>
    </form>

    <!-- Display selected Coureur details if available -->
    <div class="coureurs-container">
        <div class="coureurs-details">
            @if(isset($coureur))
                <h1>{{ $coureur->name }}</h1>
                <h3>{{ $coureur->team->team }}</h3>
                <p>{{ $coureur->bio }}</p>
        </div>
        <div class="coureurs-imag">
            <img src="{{ $coureur->photo }}" alt="{{ $coureur->name }}" alt="coureur-image" class="coureur-image" />
        </div>
        @endif
    </div>

@endsection
