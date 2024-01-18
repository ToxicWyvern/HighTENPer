@extends('layouts.app')

@section('content')

    <section class="dashboard-container">
        <h1 class="admin-uploadRace-heading">Beheer Gebruikers</h1>
        <div class="user-upload-races">
            <div class="user-admin-upload-races">
                <!-- Search Bar -->
                <form action="{{ route('admin.manageUsers') }}" method="get">
                    <input type="text" name="search" placeholder="Zoek bij naam">
                    <button type="submit">Zoek</button>
                </form>

                <!-- User Table -->
                <div class="admin-race-table">
                    <div class="admin-race-driver">Naam</div>
                    <div class="admin-race-track">Email</div>
                    <div class="user-upload-accept">Verwijderen</div>
                    <div class="user-upload-reject">Blokkeren</div>
                </div>

                @foreach($users as $user)
                    <div class="admin-race-value">
                        <div class="admin-race-driver-value">{{ $user->name }}</div>
                        <div class="admin-race-track-value">{{ $user->email }}</div>
                        <div class="user-upload-accept-cta">
                            <form action="{{ route('admin.deleteUser', ['id' => $user->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <div class="user-upload-accept-cta"><button type="submit" class="btn btn-danger">Verwijderen</button></div>
                            </form>
                        </div>
                        <div class="user-upload-reject-cta">
                            <form action="{{ route('admin.toggleBlockUser', ['id' => $user->id]) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="user-upload-reject-cta"><button type="submit" class="btn {{ $user->blocked ? 'btn-success' : 'btn-warning' }}">
                                        {{ $user->blocked ? 'Deblokkeren' : 'Blokkeren' }}
                                    </button></div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
