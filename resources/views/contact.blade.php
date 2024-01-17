
@extends('layouts.app')
@section('content')
<!-- Dit is een pagina waarin je de contact formulier ziet en daarbij kan je direct een mail sturen  -->
<section class="contact-container">
      <div class="contact">
        <h3>Contact ons</h3>
        <div class="form">
          <form
            action="mailto:s1193927@student.windesheim.nl"
            method="post"
            enctype="text/plain"
          >
            <input type="text" name="name" placeholder="Naam" />
            <input type="text" name="mail" placeholder="E-mail" />
            <textarea
              name="message"
              id="message"
              cols="30"
              rows="10"
              placeholder="Bericht"
            ></textarea>
            <input type="submit" value="Verstuur" />
          </form>
        </div>
      </div>
    </section>

@endsection

