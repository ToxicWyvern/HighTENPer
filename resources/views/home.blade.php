
@extends('layouts.app')

@section('content')
        <main>
            <section class="hero-container">
            <div class="hero">
                <h1>Welkom bij <br> Formule 1 Registratie</h1>
                <p>Race tegen je vrienden <br> en houdt de scores bij</p>
                @guest
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="hero-cta">Registreer nu -></a>
                @endif
                @else
                    <a href="/uploadLeaderboard" class="hero-cta">Upload Leaderboard</a>
                @endguest
            </div>
        </section>
        <div class="leaderboard-heading-primary">
            <h1>Bekijk de 10 beste scores van {{$activeRace->name}}</h1>
        </div>
        <section class="leaderboard-container">
            {{----------------------------------------FRONT-END REQUIRED-----------------------------------------------}}
            @if ($getBestTenScores->isEmpty())
            <h1 class="heading-noScore">No scores found.</h1>

            @else
                {{----------------------------------------FRONT-END REQUIRED-----------------------------------------------}}
                    <div class="leaderboard">
                        <div class="leaderboard-property">
                            <div class="rank">Rank</div>
                            <div class="driver">Driver</div>
                            <div class="time">Time</div>
                            <div class="team">Team</div>
                            <div class="tires">Tires</div>
                        </div>
                        @foreach($getBestTenScores as $score)
                            @if($score->verified == 0)
                                <div class="leaderboard-value" style="color: {{ $score->color }}">
                            <div class="rank-value" style="color:black"><strong>#{{ $loop->iteration }}</strong></div>
                            <div class="driver-value" style="color:black"><strong>{{ $score->driver }}</strong></div>
                            <div class="time-value" style="color:black"><strong>{{ $score->best }}</strong></div>
                            <div class="team-value" style="color:black"><strong>{{ $score->team->team }}</strong></div>
                            <div class="tires-value" style="color:black"><strong>{{ $score->tire->tire }}</strong></div>
                        </div>
                            @else
                                <div class="leaderboard-value" style="color: {{ $score->color }}">
                            <div class="rank-value">#{{ $loop->iteration }}</div>
                            <div class="driver-value">{{ $score->driver }}</div>
                            <div class="time-value">{{ $score->best }}</div>
                            <div class="team-value">{{ $score->team->team }}</div>
                            <div class="tires-value">{{ $score->tire->tire }}</div>
                        </div>
                            @endif
                        @endforeach
                    </div>

            @endif
        </section>
    </main>
@endsection
