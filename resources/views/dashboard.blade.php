@extends('layouts.app')
@section('content')


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
