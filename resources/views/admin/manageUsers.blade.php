@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Beheer Gebruikers</h1>
        <table class="table">
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('admin.deleteUser', ['id' => $user->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Verwijderen</button>
                        </form>

                        <form action="{{ route('admin.toggleBlockUser', ['id' => $user->id]) }}" method="post">
                            @csrf
                            @method('PUT')

                            <button type="submit" class="btn {{ $user->blocked ? 'btn-success' : 'btn-warning' }}">
                                {{ $user->blocked ? 'Deblokkeren' : 'Blokkeren' }}
                            </button>
                        </form>
                    </td>
                    <!-- Add other columns as needed -->
                </tr>
            @endforeach
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
            
          </div>
        </div>
      </section>
@endsection
