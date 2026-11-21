<!DOCTYPE html>
<html>
<body style="font-family: Arial, sans-serif;">
    <h2>Task completed</h2>
    <p>Good job! The following task was marked as done:</p>
    <p>
        <strong>{{ $task->title }}</strong><br>
        Date: {{ $task->task_date->format('F j, Y') }}
    </p>
    <p>Tasks for Today Management System</p>
</body>
</html>