@extends('layouts.app')

@section('content')
    <section class="forget-password-container">
      <div class="forget-password">
        <h3>Wachtwoord vergeten?</h3>
        <div class="form">
            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
    @csrf
    <input id="email" type="email" placeholder="E-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

    <button type="submit" class="btn btn-primary">
        {{ __('Stuur Wachtwoord Link') }}
    </button>
</form>

        </div>
      </div>
    </section>
@endsection
