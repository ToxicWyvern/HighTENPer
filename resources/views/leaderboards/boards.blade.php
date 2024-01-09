@extends('layouts.app')
@section('content')

<h1 class="leaderboard-heading">Leaderboard Abu Dhabi</h1>
<section class="leaderboard-container">
                <div class="leaderboard">
                    <div class="leaderboard-property">
                        <div class="rank">Rank</div>
                        <div class="time">Time</div>
                        <div class="driver">Driver</div>
                        <div class="team">Team</div>
                        <div class="tires">Tires</div>
                    </div>
                    <div class="leaderboard-value">
                        <div class="rank-value"># 1</div>
                        <div class="time-value">1:20:15</div>
                        <div class="driver-value">Niloyan</div>
                        <div class="team-value">Red Bull</div>
                        <div class="tires-value">Hard</div>
                    </div>
                    <div class="leaderboard-value">
                        <div class="rank-value"># 2</div>
                        <div class="time-value">1:31:25</div>
                        <div class="driver-value">Ebram</div>
                        <div class="team-value">Mercedes</div>
                        <div class="tires-value">Hard</div>
                    </div>

                </div>
        </section>
@endsection
