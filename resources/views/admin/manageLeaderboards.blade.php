@extends('layouts.app')

@section('content')
<html>
<h1>Admin Dashboard</h1>

<!-- Form starts here -->
<form method="POST" action="/races">
    @csrf

    <label for="name">Race Name:</label><br>
    <input type="text" id="name" name="name"><br>

    <label for="length">Length (km):</label><br>
    <input type="number" id="length" name="length"><br>

    <label for="location">Location:</label><br>
    <input type="text" id="location" name="location"><br>

    <input type="submit" value="Add Race">
</form>
<!-- Form ends here -->

</html>
@endsection
