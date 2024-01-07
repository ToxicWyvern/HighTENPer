@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<h2>Best 10 Scores</h2>
<table>
    <!-- Display the best 10 scores -->
    @foreach($bestTenScores as $score)
        <tr>
            <td>{{ $score->driver }}</td>
            <td>{{ $score->best }}</td>
        </tr>
    @endforeach
</table>
</html>
@endsection
