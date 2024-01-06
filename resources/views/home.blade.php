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

                        <h2>User's Best 5 Scores</h2>
                        <table>
                            <!-- Display the best 5 scores of the logged-in user -->
                            <!-- Adjust this part based on your actual column names -->
                            @foreach($userBestFiveScores as $score)
                                <tr>
                                    <td>{{ $score->driver }}</td>
                                    <td>{{ $score->best }}</td>
                                </tr>
                            @endforeach
                        </table>

                        <h2>User's Last 5 Uploaded Scores</h2>
                        <table>
                            <!-- Display the last 5 scores uploaded by the logged-in user -->
                            <!-- Adjust this part based on your actual column names -->
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

<!-- home.blade.php -->

