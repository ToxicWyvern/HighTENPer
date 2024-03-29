@extends('layouts.app')
@section('content')
<!-- Dit is een knop om een nieuwe race toe te voevgen  -->
<div class="addRaceBtn">
    <a href="{{ route('showScoreForm') }}" class="addRaceButton">+ Upload Leaderboard</a>
</div>
<section class="leaderboard-container">

<!-- Dit codeblok creëert een formulier waarmee de gebruiker het klassement kan filteren op basis van een
geselecteerde race. -->
<form method="post" action="{{ route('process.scores') }}">
    @csrf
    <div class="filterLeaderboard">
        <label for="race">Zoek leaderboard bij circuit:</label>
    <select name="race_id" class="form-control" id="race">
        <option value="" selected disabled style="color: #cccccc;">{{ $selectedRaceName ?? 'Bahrain' }}</option>
        @foreach($races as $raceId => $raceName)
            <option value="{{ $raceId }}">{{ $raceName }}</option>
        @endforeach
    </select>
    <button type="submit" class="filter-btn">Zoek</button>
    </div>
    
</form>


    <!-- Dit codeblok is verantwoordelijk voor het weergeven van de leaderboards voor een geselecteerde
    race. -->
    @if(isset($bestTenScores))
        <h1 class="leaderboard-heading">Leaderboard for {{ $selectedRaceName }}</h1>

        @if ($bestTenScores->isEmpty())
            <h1 class="heading-noScore">Geen Scores Gevonden.</h1>
        @else

        
            <div class="leaderboard">
                <div class="leaderboard-property">
                    <div class="rank">Rang</div>
                    <div class="driver">Racer</div>
                    <div class="time">Tijd</div>
                    <div class="team">Team</div>
                    <div class="tires">Banden</div>
                </div>
                @foreach($bestTenScores as $score)
                    <div class="leaderboard-value" style="color: {{ $score->color }}">
                        @if($score->verified == 0)
                            <div class="rank-value" style="color:black"><strong>#{{ $loop->iteration }}</strong></div>
                            <div class="driver-value" style="color:black"><strong>{{ $score->driver }}</strong></div>
                            <div class="time-value" style="color:black"><strong>{{ $score->best }}</strong></div>
                            <div class="team-value" style="color:black"><strong>{{ $teams[$score->team_id] }}</strong></div>
                            <div class="tires-value" style="color:black"><strong>{{ $tires[$score->tire_id] }}</strong></div>
                        @else
                            <div class="rank-value">#{{ $loop->iteration }}</div>
                            <div class="driver-value">{{ $score->driver }}</div>
                            <div class="time-value">{{ $score->best }}</div>
                            <div class="team-value">{{ $teams[$score->team_id] }}</div>
                            <div class="tires-value">{{ $tires[$score->tire_id] }}</div>
                        @endif
                    </div>
                @endforeach
            </div>
        </section>
        @endif
    @endif

@endsection
