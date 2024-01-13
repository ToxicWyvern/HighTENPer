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
<!-- Dit is een pagina waarin je de race doormiddel van een formulier in kan voeren.-->
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
              <label for="race" class="form-label">{{ __('Race Locatie') }}</label>
              <select id="race" class="form-control" name="race" required>
                @foreach($races as $race)
                <option value="{{ $race->id }}">{{ $race->name }}</option>
                @endforeach
              </select>
              <label for="best" class="form-label">{{ __('Beste Gereden tijd') }}</label>
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
              <label for="tires" class="form-label">{{ __('Niveau') }}</label>
              <select id="tire" class="form-control" name="tires" required>
                @foreach($tires as $tire)
                <option value="{{ $tire->id }}">{{ $tire->tire }}</option>
                @endforeach
              </select>
              <label for="scoreImage" class="form-label">{{ __('Upload bewijs') }}</label>
              <div class="upload-proof">
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
      </section>
@endsection
