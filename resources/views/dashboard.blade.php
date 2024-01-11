@extends('layouts.app')
@section('content')

<section class="dashboard-container">
    <h1 class="dashboard-heading">DASHBOARD</h1>
    <div class="dashboard">
      <div class="dashboard-username">
        <h2>{{auth::user() -> name}}</h2>
      </div>
      <div class="dashboard-cta">
        <a href="/editProfile">Profiel bewerken</a>
      </div>
    </div>
    <h1 class="history-heading">{{auth::user() -> name}}'s History</h1>
    <div class="user-history-boards">
      <div class="user-best-score-history">
        <h3 class="user-history-heading">{{auth::user() -> name}}'s best 5 scores</h3>
          {{----------------------------------------FRONT-END REQUIRED-----------------------------------------------}}
          @if ($userBestFiveScores->isEmpty())
              <tr>
                  <td colspan="5"><strong>{{ 'No scores found.' }}</strong></td>
              </tr>
          @else
              {{----------------------------------------FRONT-END REQUIRED-----------------------------------------------}}
        <div class="user-history-table">
          <div class="user-history-track">Track</div>
          <div class="user-history-time">Time</div>
          <div class="user-history-created_at">Created_at</div>
        </div>

          @foreach($userBestFiveScores as $score)
        <div class="user-history-value">
              <div class="user-history-track-value">{{ $score->race->name}}</div>
              <div class="user-history-time-value">{{ $score->best }}</div>
              <div class="user-history-created_at-value">{{ $score->created_at }}</div>
        </div>
          @endforeach
          @endif
      </div>
      <div class="user-best-score-history">
        <h3 class="user-history-heading">{{auth::user() -> name}}'s 5 last uploaded scores</h3>
          {{----------------------------------------FRONT-END REQUIRED-----------------------------------------------}}
          @if ($userLastFiveScores->isEmpty())
              <tr>
                  <td colspan="5"><strong>{{ 'No scores found.' }}</strong></td>
              </tr>
          @else
              {{----------------------------------------FRONT-END REQUIRED-----------------------------------------------}}
        <div class="user-history-table">
          <div class="user-history-track">Track</div>
          <div class="user-history-time">Time</div>
          <div class="user-history-created_at">Created_at</div>
        </div>

          @foreach($userLastFiveScores as $score)
        <div class="user-history-value">
            <div class="user-history-track-value">{{ $score->race->name}}</div>
            <div class="user-history-time-value">{{ $score->best }}</div>
            <div class="user-history-created_at-value">{{ $score->created_at }}</div>
        </div>
          @endforeach
          @endif
      </div>
    </div>
  </section>
@endsection
