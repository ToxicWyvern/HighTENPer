@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<h2>Best 10 Scores</h2>
<table>
    <!-- Display the best 10 scores -->
<<<<<<< HEAD
    @foreach($bestTenScores as $score)
        <tr>
            <td>{{ $score->driver }}</td>
            <td>{{ $score->best }}</td>
        </tr>
    @endforeach
=======
    @if ($bestTenScores->isEmpty())
        <td><strong>{{'No scores found.'}}</strong></td>
    @else
        @foreach($bestTenScores as $score)
            <tr>
                <p>
                    @if($score->verified == 0)
                        <td><strong>{{ $score->driver }}</strong></td>
                        <td><strong>{{ $score->best }}</strong></td>
                        <td><strong>{{ $score->team->team }}</strong></td>
                        <td><strong>{{ $score->tire->tire }}</strong></td>
                    @else
                        <td>{{ $score->driver }}</td>
                        <td>{{ $score->best }}</td>
                        <td>{{ $score->team->team }}</td>
                        <td>{{ $score->tire->tire }}</td>
                    @endif
                </p>
            </tr>
        @endforeach
    @endif
>>>>>>> 8fd7b8e7b7fc354e4afac39713d9c939bc43734e
</table>
</html>
@endsection
