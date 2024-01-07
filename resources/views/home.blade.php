@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                <button type="button" href="#">Create Leaderboard</button>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                            <li class="nav-item">
                                <a href="{{route('races.index')}}"> tracks</a>
                            </li>


                        <h2>User's Best 5 Scores</h2>
                        <table>
                            @foreach($userBestFiveScores as $score)
                                <tr>
                                    <td>{{ $score->driver }}</td>
                                    <td>{{ $score->best }}</td>
                                </tr>
                            @endforeach
                        </table>

                        <h2>User's Last 5 Uploaded Scores</h2>
                        <table>
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
