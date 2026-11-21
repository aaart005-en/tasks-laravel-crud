@extends('layouts.site')
@section('title', 'New Task')
@section('content')
    <h1>New Task</h1>

    @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf

        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}">

        <label for="status">Status</label>
        <select id="status" name="status">
            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="done" {{ old('status') == 'done' ? 'selected' : '' }}>Done</option>
        </select>

        <label for="task_date">Date</label>
        <input type="date" id="task_date" name="task_date" value="{{ old('task_date', today()->toDateString()) }}">

        <p>
            <button type="submit" class="btn">Save Task</button>
            <a href="{{ route('tasks') }}" class="btn btn-light">Cancel</a>
        </p>
    </form>
@endsection