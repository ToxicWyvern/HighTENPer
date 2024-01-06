{{-- resources/views/admin/dashboard.blade.php --}}

@extends('layouts.app')
<html>
</html>
@section('content')
    @if(auth()->check() && auth()->user()->admin)
{{--         Admin Dashboard content--}}
        <h1>Welcome to the Admin Dashboard!</h1>
{{--<form method="POST" action="{{ route('updateRaceId') }}" id="raceForm" enctype="multipart/form-data">--}}

{{--    @csrf <!-- CSRF protection token -->--}}

{{--    <!-- Track Dropdown -->--}}
{{--    <div class="row mb-3">--}}
{{--        <label for="race" class="col-md-4 col-form-label text-md-end">{{ __('Track') }}</label>--}}
{{--        <div class="col-md-6">--}}
{{--            <select id="race" class="form-control" name="race" required>--}}
{{--                @foreach($races as $race)--}}
{{--                    <option value="{{ $race->id }}">{{ $race->name }}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <button type="submit">Update Race</button>--}}
{{--</form>--}}
{{--<script>--}}
{{--    // Wrap the script in a window load event to ensure the DOM is fully loaded--}}
{{--    window.addEventListener('load', function () {--}}
{{--        document.getElementById('raceForm').addEventListener('submit', function (e) {--}}
{{--            e.preventDefault();--}}

{{--            var formData = new FormData(this);--}}

{{--            fetch(this.action, {--}}
{{--                method: 'POST',--}}
{{--                body: formData--}}
{{--            })--}}
{{--                .then(response => response.json())--}}
{{--                .then(data => {--}}
{{--                    // Update specificRaceId variable in the URL--}}
{{--                    window.location.href = window.location.pathname + '?specificRaceId=' + data.specificRaceId;--}}
{{--                })--}}
{{--                .catch(error => console.error('Error:', error));--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
    @else
         Unauthorized message
        <p>You are not authorized to access this page.</p>
    @endif
@endsection
