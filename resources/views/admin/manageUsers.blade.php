@extends('layouts.app')

@section('content')
<html>
<h1>Admin Dashboard</h1>

<!-- Form starts here -->
<form method="POST" action="/users/{{ $user->id }}">
    @csrf
    @method('PUT')

    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" value="{{ $user->name }}"><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" value="{{ $user->email }}"><br>

    <input type="submit" value="Update User">
</form>
<!-- Form ends here -->

<!-- Delete button starts here -->
<form method="POST" action="/users/{{ $user->id }}">
    @csrf
    @method('DELETE')

    <input type="submit" value="Delete User">
</form>
<!-- Delete button ends here -->

</html>
@endsection

