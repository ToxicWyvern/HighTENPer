

@extends('layouts.app')
<html>
<h1>
    admin dashboard


</h1>



<h1>Dashboard</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Length (km)</th>
            <th>Location</th>
        </tr>
        @foreach($races as $race)
            <tr>
                <td>{{$race->name}}</td>
                <td>{{$race->length}}</td>
                <td>{{$race->location}}</td>
            </tr>
        @endforeach
    </table>
@endsection
</html>

