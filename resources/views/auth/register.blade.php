@extends('layouts.app')

@section('content')
    <section class="register-container">
        <div class="register">
            <h3>Registreer nu</h3>
            <div class="form">
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                    <input id="name" type="text" placeholder="Naam" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                    @enderror
                    <input id="email" type="email" placeholder="E-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    <input id="password" type="password" placeholder="Wachtwoord" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input id="password-confirm" placeholder="Wachtwoord bevestigen" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    <h4 class="label-uploadprofilephoto">Upload profielfoto</h4>
                    <div class="choosefile">
                        <input id="profileImage" type="file" class="form-control" name="profileImage" accept="image/*">
                    </div>

                    <button type="submit" class="btn-register">
                        {{ __('Registreer') }}
                    </button>
                </form>
            </div>
        </div>
    </section>

@endsection
