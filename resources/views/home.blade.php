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


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
