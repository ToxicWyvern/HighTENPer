@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">{{ __('Dashboard') }}
                  <a href="{{ route('showScoreForm') }}" class="button">Upload Leaderboard</a>
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

<section class="dashboard-container">
    <h1 class="dashboard-heading">DASHBOARD</h1>
    <div class="dashboard">
      <div class="dashboard-username">
        <h2>Niloyan</h2>
      </div>
      <div class="dashboard-cta">
        <a href="#">Profiel bewerken</a>
      </div>
    </div>
    <h1 class="history-heading">USER HISTORY</h1>
    <div class="user-history-boards">
      <div class="user-best-score-history">
        <h3 class="user-history-heading">Users best 5 scores</h3>
        <div class="user-history-table">
          <div class="user-history-track">Track</div>
          <div class="user-history-time">Time</div>
          <div class="user-history-created_at">Created_at</div>
        </div>
        <div class="user-history-value">
          <div class="user-history-track-value">Bahrein</div>
          <div class="user-history-time-value">1:25:01</div>
          <div class="user-history-created_at-value">09-01-2024</div>
        </div>
        <div class="user-history-value">
          <div class="user-history-track-value">Zandvoort</div>
          <div class="user-history-time-value">1:45:01</div>
          <div class="user-history-created_at-value">24-08-2023</div>
        </div>
        <div class="user-history-value">
          <div class="user-history-track-value">Bahrein</div>
          <div class="user-history-time-value">1:25:01</div>
          <div class="user-history-created_at-value">09-01-2024</div>
        </div>
      </div>
      <div class="user-best-score-history">
        <h3 class="user-history-heading">Users 5 last uploaded scores</h3>

        <div class="user-history-table">
          <div class="user-history-track">Track</div>
          <div class="user-history-time">Time</div>
          <div class="user-history-created_at">Created_at</div>
        </div>
        <div class="user-history-value">
          <div class="user-history-track-value">Bahrein</div>
          <div class="user-history-time-value">1:25:01</div>
          <div class="user-history-created_at-value">09-01-2024</div>
        </div>
        <div class="user-history-value">
          <div class="user-history-track-value">Zandvoort</div>
          <div class="user-history-time-value">1:45:01</div>
          <div class="user-history-created_at-value">24-08-2023</div>
        </div>
        <div class="user-history-value">
          <div class="user-history-track-value">Bahrein</div>
          <div class="user-history-time-value">1:25:01</div>
          <div class="user-history-created_at-value">09-01-2024</div>
        </div>
      </div>
    </div>
  </section>
@endsection
