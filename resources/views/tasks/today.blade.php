@extends('layouts.site')

@section('title', 'Welcome')

@section('content')
    <h1>Tasks for Today</h1>
    <p>{{ now()->format('l, F j, Y') }}</p>

    @if ($tasks->isEmpty())
        <p>No tasks for today.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td><span class="badge {{ $task->status }}">{{ ucfirst($task->status) }}</span></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection