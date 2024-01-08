@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}
                        <a href="{{ route('showScoreForm') }}" class="button">Upload Leaderboard</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h2>{{ Auth::user()->name }}'s Best 5 Scores</h2>
                        <table>
                            <!-- Toon de beste 5 scores van de ingelogde gebruiker -->
                            @foreach($userBestFiveScores as $score)
                                <tr>
                                    <td>{{ $score->driver }}</td>
                                    <td>{{ $score->best }}</td>
                                </tr>
                            @endforeach
                        </table>

                        <h2>{{ Auth::user()->name }}'s Last 5 Uploaded Scores</h2>
                        <table>
                            <!-- Toon de laatste 5 scores geüpload door de ingelogde gebruiker -->
                            @foreach($userLastFiveScores as $score)
                                <tr>
                                    <td>{{ $score->driver }}</td>
                                    <td>{{ $score->best }}</td>
                                </tr>
                            @endforeach
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
