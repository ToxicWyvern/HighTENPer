
@extends('layouts.app')

@section('content')
        <main>
            <section class="hero-container">
            <div class="hero">
                <h1>Welkom bij <br> Formule 1 Registratie</h1>
                <p>Race tegen je vrienden <br> en hou de races bij</p>
                <button href="#">Registreer nu -></button>
            </div>
        </section>
        <div class="leaderboard-heading-primary">
            <h1>Bekijk de 10 beste scores van {{$activeRace->name}}</h1>
        </div>
        <section class="leaderboard-container">
            @if ($getBestTenScores->isEmpty())
                <tr>
                    <td colspan="5"><strong>{{ 'No scores found.' }}</strong></td>
                </tr>
            @else

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
                        <div class="leaderboard-value">
                            <div class="rank-value"><strong>#{{ $loop->iteration }}</strong></div>
                            <div class="driver-value"><strong>{{ $score->driver }}</strong></div>
                            <div class="time-value"><strong>{{ $score->best }}</strong></div>
                            <div class="team-value"><strong>{{ $score->team->team }}</strong></div>
                            <div class="tires-value"><strong>{{ $score->tire->tire }}</strong></div>
                        </div>
                            @else
                        <div class="leaderboard-value">
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
