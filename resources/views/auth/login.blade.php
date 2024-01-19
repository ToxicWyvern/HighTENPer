@extends('layouts.app')

@section('content')
<div class="login-container">
        <div class="login">
            <h3>Login</h3>
            <div class="form">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <input id="email" type="email" placeholder="E-mail"="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input id="password" type="password"    placeholder="Wachtwoord" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="remember-checkbox">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Onthoud mij') }}
                                    </label>
                                </div>


                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Wachtwoord vergeten?') }}
                                    </a>
                                @endif
                                <button type="submit" class="btn-login">
                                    {{ __('Login') }}
                                </button>

                </form>
            </div>
        </div>
    </div>
@endsection

