@extends('layouts.app')

@section('content')

<div class="rules-container">
    <h1>De regels</h1>
    <h3>Zo werkt het:</h3>
    <ul>
        <li>Doe een race in je F1 simulator</li>
        <li>Maak een foto van je score</li>
        <li><a href="/register">Maak een account aan</a> op onze website of <a href="/login">Login</li>
        <li>Ga naar <a href="/leaderboards">leaderboards</a> en druk op upload score</li>
        <li><a href="/uploadLeaderboard">Vul het formulier in</a> en upload daarbij de foto van je score ter bewijs</li>
        <li>Voor elke goedgekeurde score krijg je 1 trofee. Bij elke 10 trofeeën krijg je een ander kleurtje op de leaderboard (max 100)</li>
        <li>Als je je score hebt geüpload kun je deze terug vinden in <a href="/leaderboards">de leaderboards</a>  onder het juiste circuit.</li>
        <li>Heb je het zo goed gedaan dat je behoort tot de top 10 van de actuele race (hetzelfde als de echte F1 races 2024)? Dan sta je op de <a href="/">homepage</a></li>
        <li>Op het <a href="/dashboard">dashboard</a> vind je je 5 beste en 5 recentste scores</li>
        <li>Op je <a href="/feed">Feed</a> vind je hetzelfde als op je <a href="/dashboard">dashboard</a> maar dan van je vrienden!</li>

        <h4>Veel plezier met het racen!</h4>
</div>
@endsection
