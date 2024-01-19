@extends('layouts.app')

@section('content')

<div class="feed-heading">
    <h2>Vrienden Toevoegen</h2>
</div>
    <!-- Zoekbalk -->
    <form method="get" action="{{ route('addFriends') }}">
        <div class="addfriends-searchbar">
            <input type="text" name="search" placeholder="Zoek bij Naam" value="{{ request('search') }}">
        <button type="submit">Zoek</button>
        </div>
        
    </form>
    
   
    @foreach($users as $user)
    

        <!-- /*een lijst met gebruikers weer te geven en een optie te bieden om ze te volgen of niet meer te volgen. */ -->
        <div class="feed-add-friends-container">

            <div class="feeds">
                <div class="feeds-profileImage"> <img src="/storage/{{$user->profileImage}}" class="feed-profile_image"></div>
                <div class="feeds-name"> <img src="images/trophy.png" alt="trophy" class="trophy"> {{ $user->trophies }}</div>
                  <div class="feeds-name">{{ $user->name }}</div>
                <div class="feed-button"><form method="post" action="{{ route('toggleFollow') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id }}">
                    <button type="submit">
                        @if(in_array($user->id, $followedUsers))
                            Ontvolgen
                        @else
                            Volgen
                        @endif
                    </button>
                </form></div>
              </div>
            <span></span>
            <span></span>
            <span></span>
            
        </div>
    @endforeach

@endsection
