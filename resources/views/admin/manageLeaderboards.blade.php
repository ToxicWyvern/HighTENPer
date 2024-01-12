@extends('layouts.app')

@section('content')

<h1 class="leaderboard-heading">Leaderboard Abu Dhabi</h1>

<section class="leaderboard-container">
    <div class="leaderboard">
        <div class="leaderboard-property">
            <div class="rank">Rank</div>
            <div class="time">Time</div>
            <div class="driver">Driver</div>
            <div class="team">Team</div>
            <div class="tires">Tires</div>
            <div class="actions">Actions</div>
        </div>

        @foreach($leaderboard as $entry)
            <div class="leaderboard-value">
                <div class="rank-value"># {{ $entry->rank }}</div>
                <div class="time-value">{{ $entry->time }}</div>
                <div class="driver-value">{{ $entry->driver }}</div>
                <div class="team-value">{{ $entry->team }}</div>
                <div class="tires-value">{{ $entry->tires }}</div>
                <div class="actions-value">
                    @if(!$entry->isApproved())
                        <form action="{{ route('admin.approveEntry', ['id' => $entry->id]) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary">Approve</button>
                        </form>
                    @endif
                    <form action="{{ route('admin.deleteEntry', ['id' => $entry->id]) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach

    </div>
</section>

@endsection
