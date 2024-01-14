@extends('layouts.app')
@section('content')

    <section class="dashboard-container">

        @foreach ($followedUsersWithScores as $user)
            <h1 class="history-heading">{{ $user->name }}'s History</h1>

            <div class="user-best-score-history">
                <h3 class="user-history-heading">{{ $user->name }}'s best 5 scores</h3>

                @if ($user->scores->isEmpty())
                    <h1 class="heading-noScore">No scores found.</h1>
                @else
                    <div class="user-history-table">
                        <div class="user-history-track">Track</div>
                        <div class="user-history-time">Time</div>
                        <div class="user-history-created_at">Created_at</div>
                    </div>

                    @foreach ($user->scores->sortBy('best')->take(5) as $score)
                        <div class="user-history-value">
                            <div class="user-history-track-value">{{ $score->race->name }}</div>
                            <div class="user-history-time-value">{{ $score->best }}</div>
                            <div class="user-history-created_at-value">{{ $score->created_at->format('Y-m-d H:i:s') }}</div>
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="user-best-score-history">
                <h3 class="user-history-heading">{{ $user->name }}'s 5 last uploaded scores</h3>

                @if ($user->scores->isEmpty())
                    <h1 class="heading-noScore">No scores found.</h1>
                @else
                    <div class="user-history-table">
                        <div class="user-history-track">Track</div>
                        <div class="user-history-time">Time</div>
                        <div class="user-history-created_at">Created_at</div>
                    </div>

                    @foreach ($user->scores->sortByDesc('created_at')->take(5) as $score)
                        <div class="user-history-value">
                            <div class="user-history-track-value">{{ $score->race->name }}</div>
                            <div class="user-history-time-value">{{ $score->best }}</div>
                            <div class="user-history-created_at-value">{{ $score->created_at->format('Y-m-d H:i:s') }}</div>
                        </div>
                    @endforeach
                @endif
            </div>
        @endforeach
    </section>
@endsection
