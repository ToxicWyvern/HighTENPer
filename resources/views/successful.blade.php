@extends('layouts.app')

@section('content')
<!-- Dit is een pagina waarin je de succes pagina ziet als iets succesfull is geupload -->
<div class="succes-container">
    <div class="succes">
      <img src="images/checked.png" alt="succes-image" class="succes-img" />
      <h1>Succesvol geüpload!</h1>
      <p>
        De ingevoerde score wordt nog beoordeeld.<br />
        Dit kan enkele werkdagen duren.<br />
        Voorlopig zie je je score vetgedrukt op de leaderboard.
      </p>
      <a class="succes-btn" href="{{ url('/leaderboards') }}">Zie alle leaderboards</a>
    </div>
  </div>
@endsection
