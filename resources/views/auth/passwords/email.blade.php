<!-- /* De code die u heeft opgegeven, is een PHP-codefragment dat is geschreven met behulp van de
Blade-templating-engine van het Laravel-framework. */ -->
@extends('layouts.app')

@section('content')
    <section class="forget-password-container">
      <div class="forget-password">
        <h3>Wachtwoord vergeten?</h3>
        <div class="form">
            <!-- /* De code `@if (session('status'))` controleert of er een waarde is opgeslagen in de
            sessie met de sleutel 'status'. Als er een waarde is, wordt er een succeswaarschuwing
            weergegeven met de waarde van de sessievariabele 'status'. Dit wordt vaak gebruikt om
            succesberichten weer te geven na een succesvolle actie, zoals een bevestiging van het
            opnieuw instellen van het wachtwoord. */ -->
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
