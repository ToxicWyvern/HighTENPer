@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<h2>Best 10 Scores</h2>
<table>
    <!-- Display the best 10 scores -->
    @if ($getBestTenScores->isEmpty())
        <tr>
            <td colspan="5"><strong>{{ 'No scores found.' }}</strong></td>
        </tr>
    @else
        @foreach($getBestTenScores as $score)
            <tr>
                <p>
                    @if($score->verified == 0)
                        <td><strong>#{{ $loop->iteration }}</strong></td>
                        <td><strong>{{ $score->driver }}</strong></td>
                        <td><strong>{{ $score->best }}</strong></td>
                        <td><strong>{{ $score->team->team }}</strong></td>
                        <td><strong>{{ $score->tire->tire }}</strong></td>
                    @else
                        <td>#{{ $loop->iteration }}</td>
                        <td>{{ $score->driver }}</td>
                        <td>{{ $score->best }}</td>
                        <td>{{ $score->team->team }}</td>
                        <td>{{ $score->tire->tire }}</td>
                    @endif
                </p>
            </tr>
        @endforeach
    @endif
</table>
</html>
@endsection
