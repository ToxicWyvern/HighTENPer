<!-- manage_leaderboard.blade.php -->

@extends('layouts.app')

@section('content')

    <section class="dashboard-container">
        <h1 class="admin-uploadRace-heading">Beheer Leaderboards</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {!! session('success') !!}
            </div>
        @endif
        <div class="user-upload-races">
          <div class="user-admin-upload-races">
            <div class="admin-race-table">
              <div class="admin-race-driver">Coureur</div>
              <div class="admin-race-track">Circuit</div>
              <div class="admin-race-time">Tijd</div>
              <div class="user-upload-value">Bewijs</div>
              <div class="admin-race-created_at">Gemaakt Op</div>
              <div class="user-upload-accept">V</div>
              <div class="user-upload-reject">X</div>
            </div>
              @foreach($scores as $score)
            <div class="admin-race-value">
              <div class="admin-race-driver-value">{{ $score->driver }}</div>
              <div class="admin-race-track-value">{{ $score->race->name }}</div>
              <div class="admin-race-time-value">{{ $score->best }}</div>
              <div class="user-upload-value"><a href="/storage/{{ $score->scoreImage }}" target="_blank">foto</a></div>
              <div class="admin-race-created_at-value">{{ \Carbon\Carbon::parse($score->created_at)->format('d-m-Y') }}</div>
                @if(!$score->verified)
                    <div class="user-upload-accept-cta">
                    <form method="post" action="{{ route('admin.verifyScore', $score->id) }}">
                        @csrf
                            <div class="user-upload-accept-cta"><button type="submit">Accepteren</button></div>
                    </form>
                    </div>
                    <div class="user-upload-reject-cta">
                    <form method="post" action="{{ route('admin.rejectScore', ['id' => $score->id]) }}">
                        @csrf
                        @method('delete')
                            <div class="user-upload-reject-cta"><button type="submit">Afwijzen</button></div>
                    </form>
                    </div>
                @endif
            </div>
              @endforeach
          </div>
        </div>
      </section>
@endsection
