<?php

namespace App\Http\Controllers;

use App\Mail\TaskCompleted;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function today()
    {
        $tasks = Task::active()->today()->orderBy('id')->get();
        return view('tasks.today', compact('tasks'));
    }

    public function index()
    {
        $tasks = Task::active()->orderBy('task_date')->orderBy('id')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'     => 'required|string|max:255',
            'status'    => 'required|in:pending,done',
            'task_date' => 'required|date',
        ]);

        Task::create($data);

        return redirect()->route('tasks')->with('success', 'Task created.');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'title'     => 'required|string|max:255',
            'status'    => 'required|in:pending,done',
            'task_date' => 'required|date',
        ]);

        $oldStatus = $task->status;

        $task->update($data);

        // Send the email only when the status changes to done
        if ($oldStatus !== 'done' && $task->status === 'done') {
            Mail::to($request->user()->email)->send(new TaskCompleted($task));
        }

        return redirect()->route('tasks')->with('success', 'Task updated.');
    }

    public function destroy(Task $task)
    {
        $task->update(['is_archived' => true]);

        return redirect()->route('tasks')->with('success', 'Task archived.');
    }
}