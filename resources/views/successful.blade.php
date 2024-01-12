@extends('layouts.app')

@section('content')
<!-- Dit is een pagina waarin je de succes pagina ziet als iets succesfull is geupload -->
<div class="succes-container">
    <div class="succes">
      <img src="images/checked.png" alt="succes-image" class="succes-img" />
      <h1>Successfully Uploaded!</h1>
      <p>
        The entered score is still being considered.<br />
        This will take several working days.<br />
        For now you will see your score in bold.
      </p>

      <a class="succes-btn" href="{{ url('/leaderboards') }}">See the main leaderboard</a>
    </div>
  </div>
@endsection
