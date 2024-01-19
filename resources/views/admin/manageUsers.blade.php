@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Beheer Gebruikers</h1>
       <!-- dit is een PHP-codefragment dat wordt gebruikt om een tabel met
       gebruikers weer te geven. */ -->
        <table class="table">
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                    <!-- /* hier worden twee formulieren gemaakt met knoppen
                    voor het beheren van gebruikersacties. */ -->
                        <form action="{{ route('admin.deleteUser', ['id' => $user->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Verwijderen</button>
                        </form>

    <section class="manageusers-container">
        <h1 class="admin-uploadRace-heading">Beheer Gebruikers</h1>
        <!-- Search Bar -->

                            <button type="submit" class="btn {{ $user->blocked ? 'btn-success' : 'btn-warning' }}">
                                {{ $user->blocked ? 'Deblokkeren' : 'Blokkeren' }}
                            </button>
                        </form>
                    </td>
               
                </tr>
            @endforeach
        </table>
    </div>
@endsection
