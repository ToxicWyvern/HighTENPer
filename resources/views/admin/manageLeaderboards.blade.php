<!-- manage_leaderboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Beheer Leaderboard</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Coureur</th>
                    <th>Baan</th>
                    <th>Tijd</th>
                    <th>Bewijs Materiaal</th>
                    <th>Geüpload Op</th>
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
                            <button type="submit" class="btn btn-success">Goedkeuren</button>
                            </form>

                            <form method="post" action="{{ route('admin.rejectScore', $score->id) }}">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Afwijzen</button>
</form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
