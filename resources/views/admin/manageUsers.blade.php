@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Beheer Gebruikers</h1>
        <table class="table">
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('admin.deleteUser', ['id' => $user->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Verwijderen</button>
                        </form>

                        <form action="{{ route('admin.toggleBlockUser', ['id' => $user->id]) }}" method="post">
                            @csrf
                            @method('PUT')

                            <button type="submit" class="btn {{ $user->blocked ? 'btn-success' : 'btn-warning' }}">
                                {{ $user->blocked ? 'Deblokkeren' : 'Blokkeren' }}
                            </button>
                        </form>
                    </td>
                    <!-- Add other columns as needed -->
                </tr>
            @endforeach
        </table>
    </div>
@endsection
