
<!-- manage_leaderboard.blade.php -->

<!-- /* De code die u hebt opgegeven, is een Blade-sjabloonbestand in PHP. Het wordt gebruikt om de
HTML-inhoud voor de pagina "Klassementen beheren" te genereren. */ -->

@extends('layouts.app')

<!-- /* De `section('content')` is een Blade-richtlijn in Laravel, die wordt gebruikt om een sectie met
inhoud in een weergavebestand te definiëren. In dit geval definieert het de inhoudssectie voor het
bestand "manage_leaderboard.blade.php". */ -->

@section('content')
    <div class="container">
        <h1>Beheer Leaderboards</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Racer</th>
                    <th>Circuit</th>
                    <th>Tijd</th>
                    <th>Bewijs Materiaal</th>
                    <th>Geüpload Op</th>
                    <th>Verifiëren</th>
                </tr>
            </thead>
            <tbody>
                <!-- /* dit is een lus die een reeks `` doorloopt en een
                tabelrij genereert (`<tr> `) voor elke score. */ -->
                @foreach($scores as $score)
                    <tr>
                        <td>{{ optional($score->user)->name }}</td>
                        <td>{{ $score->race->name }}</td>
                        <td><img src="/proofs{{ $score->scoreImage }}" alt="Score Image" width="50"></td>
                        <td>{{ $score->driver }}</td>
                        <td>{{ $score->race->name }}</td>
                        <td>{{ $score->best }}</td>
                        <td><img src="/storage/{{ $score->scoreImage }}" alt="Score Image" width="50"></td>
                        <td>{{ $score->created_at }}</td>
                        <td>
                            @if(!$score->verified)
                            <form method="post" action="{{ route('admin.verifyScore', $score->id) }}">
    @csrf
                            <button type="submit" class="btn btn-success">Goedkeuren</button>
                            </form>

                            <form method="post" action="{{ route('admin.rejectScore', $score->id) }}">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Afwijzen</button>
</form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
