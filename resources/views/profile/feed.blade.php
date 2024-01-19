@extends('layouts.app')
@section('content')

    <section class="dashboard-container">
        <div class="dashboard-cta">
            <a href="/addFriends" class="feedAddButton">Vrienden Toevoegen</a>
        </div>
        @foreach ($followedUsersWithScores as $user)
            <h1 class="history-heading">{{ $user->name }}'s Geschiedenis</h1>

            <div class="user-best-score-history">
                <h3 class="user-history-heading">{{ $user->name }}'s beste 5 scores</h3>

                @if ($user->scores->isEmpty())
                    <h1 class="heading-noScore">Geen Scores Gevonden.</h1>
                @else
                    <div class="user-history-table">
                        <div class="user-history-track">Circuit</div>
                        <div class="user-history-time">Tijd</div>
                        <div class="user-history-created_at">Gemaakt Op</div>
                    </div>

                    @foreach ($user->scores->sortBy('best')->take(5) as $score)
                        <div class="user-history-value">
                            <div class="user-history-track-value">{{ $score->race->name }}</div>
                            <div class="user-history-time-value">{{ $score->best }}</div>
                            <div class="user-history-created_at-value">{{ \Carbon\Carbon::parse($score->created_at)->format('d-m-Y') }}</div>
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="user-best-score-history">
                <h3 class="user-history-heading">{{ $user->name }}'s 5 laatst geüploade scores</h3>

                @if ($user->scores->isEmpty())
                    <h1 class="heading-noScore">Geen Scores Gevonden.</h1>
                @else
                    <div class="user-history-table">
                        <div class="user-history-track">Circuit</div>
                        <div class="user-history-time">Tijd</div>
                        <div class="user-history-created_at">Gemaakt Op</div>
                    </div>

                    @foreach ($user->scores->sortByDesc('created_at')->take(5) as $score)
                        <div class="user-history-value">
                            <div class="user-history-track-value">{{ $score->race->name }}</div>
                            <div class="user-history-time-value">{{ $score->best }}</div>
                            <div class="user-history-created_at-value">{{ \Carbon\Carbon::parse($score->created_at)->format('s:m:h d-m-Y') }}</div>
                        </div>
                    @endforeach
                @endif
            </div>
        @endforeach
    </section>
@endsection
