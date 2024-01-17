<!-- manage_leaderboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Manage Leaderboard</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Driver</th>
                    <th>Track</th>
                    <th>Time</th>
                    <th>Score Image</th>
                    <th>Created At</th>
                    <th>Verifiëren</th>
                </tr>
            </thead>
            <tbody>
                @foreach($scores as $score)
                    <tr>
                        <td>{{ $score->driver }}</td>
                        <td>{{ $score->race->name }}</td>
                        <td>{{ $score->best }}</td>
                        <td><img src="/proofs{{ $score->scoreImage }}" alt="Score Image" width="50"></td>
                        <td>{{ $score->created_at }}</td>
                        <td>
                            @if(!$score->verified)
                            <form method="post" action="{{ route('admin.verifyScore', $score->id) }}">
    @csrf
                            <button type="submit" class="btn btn-success">Verify</button>
                            </form>

                            <form method="post" action="{{ route('admin.rejectScore', $score->id) }}">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Reject</button>
</form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
