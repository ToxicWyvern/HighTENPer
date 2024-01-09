@extends('layouts.app')
@section('content')

{{-- <!DOCTYPE html>
>>>>>>> 67ff75871d3d5b14d1121112a5e0aa497f476766
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{--<<<<<<< HEAD--}}
{{--<h2>Best 10 Scores</h2>--}}
{{--<table>--}}
{{--    <!-- Display the best 10 scores -->--}}
{{--    @if ($getBestTenScores->isEmpty())--}}
{{--        <tr>--}}
{{--            <td colspan="5"><strong>{{ 'No scores found.' }}</strong></td>--}}
{{--        </tr>--}}
{{--    @else--}}
{{--        @foreach($getBestTenScores as $score)--}}
{{--            <tr>--}}
{{--                <p>--}}
{{--                    @if($score->verified == 0)--}}
{{--                        <td><strong>#{{ $loop->iteration }}</strong></td>--}}
{{--                        <td><strong>{{ $score->driver }}</strong></td>--}}
{{--                        <td><strong>{{ $score->best }}</strong></td>--}}
{{--                        <td><strong>{{ $score->team->team }}</strong></td>--}}
{{--                        <td><strong>{{ $score->tire->tire }}</strong></td>--}}
{{--                    @else--}}
{{--                        <td>#{{ $loop->iteration }}</td>--}}
{{--                        <td>{{ $score->driver }}</td>--}}
{{--                        <td>{{ $score->best }}</td>--}}
{{--                        <td>{{ $score->team->team }}</td>--}}
{{--                        <td>{{ $score->tire->tire }}</td>--}}
{{--                    @endif--}}
{{--                </p>--}}
{{--            </tr>--}}
{{--        @endforeach--}}
{{--    @endif--}}
{{--</table>--}}
{{--=======--}}
        <main>
            <section class="hero-container">
            <div class="hero">
                <h1>Welkom bij <br> Formule 1 Registratie</h1>
                <p>Race tegen je vrienden <br> en hou de races bij</p>
                <button>Registreer nu -></button>
            </div>
        </section>
        <div class="leaderboard-heading-primary">
            <h1>Bekijk de races van Abu Dhabi</h1>
        </div>
        <section class="leaderboard-container">
                <div class="leaderboard">
                    <div class="leaderboard-property">
                        <div class="rank">Rank</div>
                        <div class="driver">Driver</div>
                        <div class="time">Time</div>
                        <div class="team">Team</div>
                        <div class="tires">Tires</div>
                    </div>
                    <div class="leaderboard-value">
                        <div class="rank-value"># 1</div>
                        <div class="driver-value">Niloyan</div>
                        <div class="time-value">1:20:15</div>
                        <div class="team-value">Red Bull</div>
                        <div class="tires-value">Hard</div>
                    </div>
                    <div class="leaderboard-value">
                        <div class="rank-value"># 2</div>
                        <div class="driver-value">Ebram</div>
                        <div class="time-value">1:31:25</div>
                        <div class="team-value">Mercedes</div>
                        <div class="tires-value">Hard</div>
                    </div>

                      <div class="leaderboard-value">
                        <div class="rank-value"># 3</div>
                        <div class="driver-value">Thijs</div>
                        <div class="time-value">1:31:25</div>
                        <div class="team-value">Mercedes</div>
                        <div class="tires-value">Hard</div>
                    </div>
                      <div class="leaderboard-value">
                        <div class="rank-value"># 4</div>
                        <div class="driver-value">Pedro</div>
                        <div class="time-value">1:40:34</div>
                        <div class="team-value">Mercedes</div>
                        <div class="tires-value">Hard</div>
                    </div>
                      <div class="leaderboard-value">
                        <div class="rank-value"># 5</div>
                        <div class="driver-value">Renas</div>
                        <div class="time-value">1:41:25</div>
                        <div class="team-value">Mercedes</div>
                        <div class="tires-value">Hard</div>
                    </div>
                      <div class="leaderboard-value">
                        <div class="rank-value"># 6</div>
                        <div class="driver-value">Ebram</div>
                        <div class="time-value">1:44:45</div>
                        <div class="team-value">Mercedes</div>
                        <div class="tires-value">Hard</div>
                    </div>
                      <div class="leaderboard-value">
                        <div class="rank-value"># 7</div>
                        <div class="driver-value">Ebram</div>
                        <div class="time-value">1:31:25</div>
                        <div class="team-value">Mercedes</div>
                        <div class="tires-value">Hard</div>
                    </div>
                      <div class="leaderboard-value">
                        <div class="rank-value"># 8</div>
                        <div class="driver-value">Ebram</div>
                        <div class="time-value">1:31:25</div>
                        <div class="team-value">Mercedes</div>
                        <div class="tires-value">Hard</div>
                    </div>
                      <div class="leaderboard-value">
                        <div class="rank-value"># 9</div>
                        <div class="driver-value">Ebram</div>
                        <div class="time-value">1:31:25</div>
                        <div class="team-value">Mercedes</div>
                        <div class="tires-value">Hard</div>
                    </div>
                      <div class="leaderboard-value">
                        <div class="rank-value"># 10</div>
                        <div class="driver-value">Ebram</div>
                        <div class="time-value">1:31:25</div>
                        <div class="team-value">Mercedes</div>
                        <div class="tires-value">Hard</div>
                    </div>

                </div>
        </section>
    </main>
@endsection
