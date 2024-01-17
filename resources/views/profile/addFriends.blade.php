@extends('layouts.app')

@section('content')

    <h2>Vrienden Toevoegen</h2>

    <!-- Search Bar -->
    <form method="get" action="{{ route('addFriends') }}">
        <input type="text" name="search" placeholder="Zoek bij Naam" value="{{ request('search') }}">
        <button type="submit">Zoek</button>
    </form>

    @foreach($users as $user)
        <div>
            <span><img src="/storage/{{$user->profileImage}}"></span>
            <span>{{ $user->name }}</span>
            <span><img src="images/trophy.png" alt="trophy"> {{ $user->trophies }}</span>
            <form method="post" action="{{ route('toggleFollow') }}">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <button type="submit">
                    @if(in_array($user->id, $followedUsers))
                        Ontvolgen
                    @else
                        Volgen
                    @endif
                </button>
            </form>
        </div>
    @endforeach

@endsection
