@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Manage Users</h1>
        <table class="table">
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('admin.deleteUser', ['id' => $user->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    <!-- Add other columns as needed -->
                </tr>
            @endforeach
        </table>
    </div>
@endsection
