@extends('layouts.app')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Upload Leaderboard') }}</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                            <form method="POST" action="{{ route('submitScore') }}" enctype="multipart/form-data">

                            @csrf <!-- CSRF protection token -->

                            <!-- Track Dropdown -->
                            <div class="row mb-3">
                                <label for="race" class="col-md-4 col-form-label text-md-end">{{ __('Track') }}</label>
                                <div class="col-md-6">
                                    <select id="race" class="form-control" name="race" required>
                                        @foreach($races as $race)
                                            <option value="{{ $race->id }}">{{ $race->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Best Lap Time Input -->
                            <div class="row mb-3">
                                <label for="best" class="col-md-4 col-form-label text-md-end">{{ __('Best Lap Time') }}</label>
                                <div class="col-md-6">
                                    <input type="text" name="best" id="best" placeholder="Format: MM:SS:MS" required onblur="validateBestLapTime()">
                                    @error('best')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Team Dropdown -->
                            <div class="row mb-3">
                                <label for="team" class="col-md-4 col-form-label text-md-end">{{ __('Team') }}</label>
                                <div class="col-md-6">
                                    <select id="team" class="form-control" name="team" required>
                                        @foreach($teams as $team)
                                            <option value="{{ $team->id }}">{{ $team->team }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Tires Dropdown -->
                                <div class="row mb-3">
                                    <label for="tires" class="col-md-4 col-form-label text-md-end">{{ __('Tires') }}</label>
                                    <div class="col-md-6">
                                        <select id="tire" class="form-control" name="tires" required>
                                            @foreach($tires as $tire)
                                                <option value="{{ $tire->id }}">{{ $tire->tire }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            <!-- Upload Proof (File Input) -->
                            <div class="row mb-3">
                                <label for="scoreImage" class="col-md-4 col-form-label text-md-end">{{ __('Upload Proof') }}</label>
                                <div class="col-md-6">
                                    <input id="scoreImage" type="file" class="form-control @error('scoreImage') is-invalid @enderror" name="scoreImage" required>
                                    @error('scoreImage')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit Scoreboard') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    <section class="uploadRace-container">
        <div class="uploadRace">
          <h3>Upload Race</h3>
          <div class="form">
            <form method="POST" action="{{ route('submitScore') }}" enctype="multipart/form-data">
              @csrf
              <!-- CSRF protection token -->
              <label for="race" class="form-label">{{ __('Track') }}</label>
              <select id="race" class="form-control" name="race" required>
                @foreach($races as $race)
                <option value="{{ $race->id }}">{{ $race->name }}</option>
                @endforeach
              </select>
              <label for="best" class="form-label">{{ __('Best Lap Time') }}</label>
              <input
                type="text"
                name="best"
                id="best"
                placeholder="Format: MM:SS:MS"
                required
                onblur="validateBestLapTime()" />
              @error('best')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
               @enderror 
              <label for="team" class="form-label">{{ __('Team') }}</label>
              <select id="team" class="form-control" name="team" required>
                @foreach($teams as $team)
                <option value="{{ $team->id }}">{{ $team->team }}</option>
                @endforeach
              </select>
              <label for="tires" class="form-label">{{ __('Tires') }}</label>
              <select id="tire" class="form-control" name="tires" required>
                @foreach($tires as $tire)
                <option value="{{ $tire->id }}">{{ $tire->tire }}</option>
                @endforeach
              </select>
              <div class="choosefile">
                <label for="scoreImage" class="col-md-4 col-form-label text-md-end">{{ __('Upload Proof') }}</label>
                <input
                  id="scoreImage"
                  type="file"
                  class="form-control @error('scoreImage') is-invalid @enderror"
                  name="scoreImage"
                  required />
                @error('scoreImage')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <button type="submit" class="btn-uploadRace">{{ __('Submit Scoreboard') }}</button>
            </form>
          </div>
        </div>
      </section> --}}
@endsection
