@extends('layouts.app')
@section('content')
<!-- Dit is een knop om een nieuwe race toe te voevgen  -->
    <div class="addRaceBtn">
        <a href="{{ route('showScoreForm') }}" class="addRaceButton">+ Upload Leaderboard</a>
    </div>
{{----------------------------------------FRONT-END REQUIRED-----------------------------------------------}}
    <form method="post" action="{{ route('process.scores') }}">
        @csrf
        <label for="race">Search Leaderboards By Track:</label>
        <select name="race_id" id="race">
            @foreach($races as $raceId => $raceName)
                <option value="{{ $raceId }}">{{ $raceName }}</option>
            @endforeach
        </select>
        <button type="submit">Search</button>
    </form>
    {{----------------------------------------FRONT-END REQUIRED-----------------------------------------------}}

    @if(isset($bestTenScores))
        <h1 class="leaderboard-heading">Leaderboard for {{ $selectedRaceName }}</h1>

        {{----------------------------------------FRONT-END REQUIRED-----------------------------------------------}}
        @if ($bestTenScores->isEmpty())
            <h1 class="heading-noScore">No scores found.</h1>
        @else
            {{----------------------------------------FRONT-END REQUIRED-----------------------------------------------}}

        <section class="leaderboard-container">
            <div class="leaderboard">
                <div class="leaderboard-property">
                    <div class="rank">Rank</div>
                    <div class="driver">Driver</div>
                    <div class="time">Time</div>
                    <div class="team">Team</div>
                    <div class="tires">Tires</div>
                </div>
                @foreach($bestTenScores as $score)
                    <div class="leaderboard-value">
                        @if($score->verified == 0)
                            <div class="rank-value"><strong>#{{ $loop->iteration }}</strong></div>
                            <div class="driver-value"><strong>{{ $score->driver }}</strong></div>
                            <div class="time-value"><strong>{{ $score->best }}</strong></div>
                            <div class="team-value"><strong>{{ $teams[$score->team_id] }}</strong></div>
                            <div class="tires-value"><strong>{{ $tires[$score->tire_id] }}</strong></div>
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
