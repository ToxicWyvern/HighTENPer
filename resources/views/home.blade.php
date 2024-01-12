@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}
                        <a href="{{ route('showScoreForm') }}" class="button">Upload Leaderboard</a>
                    </div>
        <main>
            <section class="hero-container">
            <div class="hero">
                <h1>Welkom bij <br> Formule 1 Registratie</h1>
                <p>Race tegen je vrienden <br> en houdt de scores bij</p>
                @guest
                @if (Route::has('register'))
                <button href="{{ route('register') }}">Registreer nu -></button>
                @endif
                @else
                    <button href="/uploadLeaderboard">Upload Leaderboard</button>
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

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h2>{{ Auth::user()->name }}'s Best 5 Scores</h2>
                        <table>
                            <!-- Toon de beste 5 scores van de ingelogde gebruiker -->
                            @foreach($userBestFiveScores as $score)
                                <tr>
                                    <td>{{ $score->driver }}</td>
                                    <td>{{ $score->best }}</td>
                                </tr>
                            @endforeach
                        </table>

                        <h2>{{ Auth::user()->name }}'s Last 5 Uploaded Scores</h2>
                        <table>
                            <!-- Toon de laatste 5 scores geüpload door de ingelogde gebruiker -->
                            @foreach($userLastFiveScores as $score)
                                <tr>
                                    <td>{{ $score->driver }}</td>
                                    <td>{{ $score->best }}</td>
                                </tr>
                            @endforeach
                        </table>


                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
