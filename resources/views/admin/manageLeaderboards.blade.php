<!-- manage_leaderboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Beheer Leaderboards</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Racer</th>
                    <th>Circuit</th>
                    <th>Tijd</th>
                    <th>Bewijs Materiaal</th>
                    <th>Geüpload Op</th>
                    <th>Verifiëren</th>
                </tr>
            </thead>
            <tbody>
                @foreach($scores as $score)
                    <tr>
                        <td>{{ $score->driver }}</td>
                        <td>{{ $score->race->name }}</td>
                        <td>{{ $score->best }}</td>
                        <td><img src="/storage/{{ $score->scoreImage }}" alt="Score Image" width="50"></td>
                        <td>{{ \Carbon\Carbon::parse($score->created_at)->format('d-m-Y') }}</td>
                        <td>
                            @if(!$score->verified)
                            <form method="post" action="{{ route('admin.verifyScore', $score->id) }}">
    @csrf
                            <button type="submit" class="btn btn-success">Goedkeuren</button>
                            </form>

                            <form method="post" action="{{ route('admin.rejectScore', $score->id) }}">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Afwijzen</button>
</form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <section class="dashboard-container">
        <h1 class="admin-uploadRace-heading">Controleer Races</h1>
        <div class="user-upload-races">
          <div class="user-admin-upload-races">
            <div class="admin-race-table">
              <div class="admin-race-driver">Courreur</div>
              <div class="admin-race-track">Baan</div>
              <div class="admin-race-time">Time</div>
              <div class="user-upload-value">Bewijs</div>
              <div class="admin-race-created_at">Created_at</div>
              <div class="user-upload-accept">V</div>
              <div class="user-upload-reject">X</div>
            </div>
            <div class="admin-race-value">
              <div class="admin-race-driver-value">Niloyan Sellathurai</div>
              <div class="admin-race-track-value">Bahrein</div>
              <div class="admin-race-time-value">1:25:01</div>
              <div class="user-upload-value"><a href="#">foto</a></div>
              <div class="admin-race-created_at-value">09-01-2024</div>
              <div class="user-upload-accept-cta"><a href="#">Accepteren</a></div>
              <div class="user-upload-reject-cta"><a href="#">Afwijzen</a></div>
            </div>
            <div class="admin-race-value">
              <div class="admin-race-driver-value">Niloyan Sellathurai</div>
              <div class="admin-race-track-value">Bahrein</div>
              <div class="admin-race-time-value">1:25:01</div>
              <div class="user-upload-value"><a href="#">foto</a></div>
              <div class="admin-race-created_at-value">09-01-2024</div>
              <div class="user-upload-accept-cta"><a href="#">Accepteren</a></div>
              <div class="user-upload-reject-cta"><a href="#">Afwijzen</a></div>
            </div>
            <div class="admin-race-value">
              <div class="admin-race-driver-value">Niloyan Sellathurai</div>
              <div class="admin-race-track-value">Bahrein</div>
              <div class="admin-race-time-value">1:25:01</div>
              <div class="user-upload-value"><a href="#">foto</a></div>
              <div class="admin-race-created_at-value">09-01-2024</div>
              <div class="user-upload-accept-cta"><a href="#">Accepteren</a></div>
              <div class="user-upload-reject-cta"><a href="#">Afwijzen</a></div>
            </div>
          </div>
        </div>
      </section>
@endsection
