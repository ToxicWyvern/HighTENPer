<!-- manage_leaderboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Manage Leaderboard</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Race</th>
                    <th>Score Image</th>
                    <th>Driver</th>
                    <th>Verified</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($scores as $score)
                    <tr>
                        <td>{{ $score->users->name }}</td>
                        <td>{{ $score->race->name }}</td>
                        <td><img src="{{ $score->scoreImage }}" alt="Score Image" width="50"></td>
                        <td>{{ $score->driver }}</td>
                        <td>{{ $score->verified ? 'Yes' : 'No' }}</td>
                        <td>
                            @if(!$score->verified)
                                <form method="post" action="{{ route('scores.verify', $score->id) }}">
                                    @csrf
                                    @method('patch')
                                    <button type="submit" class="btn btn-success">Verify</button>
                                </form>

                                <form method="post" action="{{ route('scores.reject', $score->id) }}">
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
