@extends('layouts.app')

@section('content')

    <h2>Add Friends</h2>

    <!-- Search Bar -->
    <form method="get" action="{{ route('addFriends') }}">
        <input type="text" name="search" placeholder="Search by name" value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>

    @foreach($users as $user)
        <div>
            <span>{{ $user->name }}</span>
            <span><img src="images/trophy.png" alt="trophy"> {{ $user->trophies }}</span>
            <form method="post" action="{{ route('toggleFollow') }}">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <button type="submit">
                    @if(in_array($user->id, $followedUsers))
                        Following
                    @else
                        Follow
                    @endif
                </button>
            </form>
        </div>
    @endforeach

@endsection
