@extends('layouts.site')

@section('title', 'Profile')

@section('content')
    <h1>Profile</h1>

    @if ($user)
        <table>
            <tr><th>Username</th><td>{{ $user->username }}</td></tr>
            <tr><th>Full Name</th><td>{{ $user->full_name }}</td></tr>
            <tr><th>Email</th><td>{{ $user->email }}</td></tr>
        </table>
    @else
        <p>No user found.</p>
    @endif
@endsection