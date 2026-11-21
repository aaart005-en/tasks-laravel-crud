@extends('layouts.site')
@section('title', 'Task List')
@section('content')
    <h1>All Tasks</h1>

    @auth
        <div class="toolbar">
            <a href="{{ route('tasks.create') }}" class="btn">+ New Task</a>
        </div>
    @endauth

    <table>
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Title</th>
            <th>Status</th>
            @auth
                <th>Actions</th>
            @endauth
        </tr>
        @forelse ($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->task_date->format('M d, Y') }}</td>
                <td>{{ $task->title }}</td>
                <td><span class="badge {{ $task->status }}">{{ ucfirst($task->status) }}</span></td>
                @auth
                    <td class="actions">
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-light">Edit</a>
                        <form method="POST" action="{{ route('tasks.destroy', $task) }}"
                              onsubmit="return confirm('Archive this task?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Archive</button>
                        </form>
                    </td>
                @endauth
            </tr>
        @empty
            <tr>
                <td colspan="5">No tasks found.</td>
            </tr>
        @endforelse
    </table>
@endsection