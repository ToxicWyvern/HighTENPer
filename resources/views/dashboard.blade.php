@extends('layouts.app')
@section('content')

    <head>
        <script src="https://cdn.jsdelivr.net/npm/moment"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </head>

    <section class="dashboard-container">
        <h1 class="dashboard-heading">DASHBOARD</h1>
        <div class="dashboard">

        <!-- geeft username weer -->
            <div class="dashboard-username">
                <h2>{{ auth::user()->name }}</h2>
            </div>
            <!-- profiel bewerken knop -->
            <div class="dashboard-cta">
                <a href="/editProfile">Profiel bewerken</a>
            </div>
        </div>
        <h1 class="history-heading">{{ auth::user()->name }}'s Geschiedenis</h1>
        
         <!-- laat beste 5 scores zien -->
        <div class="user-history-boards">
            <div class="user-best-score-history">
                <h3 class="user-history-heading">{{ auth::user()->name }}'s beste 5 scores</h3>
                @if ($userBestFiveScores->isEmpty())
                    <tr>
                        <h1 class="heading-noScore">Geen Scores Gevonden.</h1>
                    </tr>
                @else
                    <div class="user-history-table">
                        <div class="user-history-track">Circuit</div>
                        <div class="user-history-time">Tijd</div>
                        <div class="user-history-created_at">Gemaakt Op</div>
                    </div>

                    @foreach($userBestFiveScores as $score)
                        <div class="user-history-value">
                            <div class="user-history-track-value">{{ $score->race->name }}</div>
                            <div class="user-history-time-value">{{ $score->best }}</div>
                            <div class="user-history-created_at-value">{{ \Carbon\Carbon::parse($score->created_at)->format('d-m-Y') }}</div>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- laat 5 laatst geüploade scores zien -->
            <div class="user-best-score-history">
                <h3 class="user-history-heading">{{ auth::user()->name }}'s 5 laatst geüploade scores</h3>
                @if ($userLastFiveScores->isEmpty())
                    <tr>
                        <h1 class="heading-noScore">Geen Scores Gevonden.</h1>
                    </tr>
                @else
                    <div class="user-history-table">
                        <div class="user-history-track">Circuit</div>
                        <div class="user-history-time">Tijd</div>
                        <div class="user-history-created_at">Gemaakt Op</div>
                    </div>

                    @foreach($userLastFiveScores as $score)
                        <div class="user-history-value">
                            <div class="user-history-track-value">{{ $score->race->name }}</div>
                            <div class="user-history-time-value">{{ $score->best }}</div>
                            <div class="user-history-created_at-value">{{ \Carbon\Carbon::parse($score->created_at)->format('d-m-Y') }}</div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

<!-- Gebruikersstatestieken weergeven doormiddel van een chart -->
        <div class="container">

            <canvas id="myChart" width="400" height="200"></canvas>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        datasets: [{
                            label: 'My Area Chart',
                            data: @json($chartData),
                            fill: true,
                            borderColor: 'rgba(75, 192, 192, 0.2)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        }],
                    },
                    options: {
                        scales: {
                            x: [{
                                type: 'time',
                                time: {
                                    unit: 'day',
                                    displayFormats: {
                                        day: 'MMM D',
                                    },
                                },
                            }],
                            y: {
                                beginAtZero: true,
                            },
                        },
                    },
                });
            </script>
        </div>
    </section>
@endsection
