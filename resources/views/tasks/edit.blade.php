@extends('layouts.site')
@section('title', 'Edit Task')
@section('content')
    <h1>Edit Task</h1>

    @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('PUT')

        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title', $task->title) }}">

        <label for="status">Status</label>
        <select id="status" name="status">
            <option value="pending" {{ old('status', $task->status) == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="done" {{ old('status', $task->status) == 'done' ? 'selected' : '' }}>Done</option>
        </select>

        <label for="task_date">Date</label>
        <input type="date" id="task_date" name="task_date" value="{{ old('task_date', $task->task_date->toDateString()) }}">

        <p>
            <button type="submit" class="btn">Update Task</button>
            <a href="{{ route('tasks') }}" class="btn btn-light">Cancel</a>
        </p>
    </form>
@endsection