<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | Tasks for Today</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f5f6fa; }
        nav { background: #2c3e50; padding: 12px 24px; display: flex; align-items: center; }
        nav a { color: #fff; margin-right: 18px; text-decoration: none; }
        nav a.active { font-weight: bold; border-bottom: 2px solid #fff; }
        nav .spacer { flex: 1; }
        nav .who { color: #bdc3c7; margin-right: 14px; font-size: 14px; }
        nav button { background: none; border: 1px solid #fff; color: #fff; padding: 4px 12px; border-radius: 4px; cursor: pointer; }
        main { max-width: 900px; margin: 24px auto; background: #fff; padding: 24px; border-radius: 6px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background: #ecf0f1; }
        .badge { padding: 2px 10px; border-radius: 12px; font-size: 13px; }
        .pending { background: #fff3cd; color: #7a5b00; }
        .done { background: #d4edda; color: #1d5a2c; }
        .flash { background: #d4edda; color: #1d5a2c; padding: 10px 14px; border-radius: 4px; margin-bottom: 16px; }
        .errors { background: #f8d7da; color: #842029; padding: 10px 14px; border-radius: 4px; margin-bottom: 16px; }
        .errors ul { margin: 0; padding-left: 18px; }
        label { display: block; margin: 12px 0 4px; font-weight: bold; }
        input[type=text], input[type=date], select { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .btn { display: inline-block; background: #2c3e50; color: #fff; border: none; padding: 8px 16px; border-radius: 4px; text-decoration: none; cursor: pointer; font-size: 14px; }
        .btn-danger { background: #c0392b; }
        .btn-light { background: #7f8c8d; }
        .actions form { display: inline; }
        .toolbar { margin-bottom: 16px; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Welcome</a>
        <a href="{{ route('tasks') }}" class="{{ request()->routeIs('tasks') ? 'active' : '' }}">Task List</a>
        <a href="{{ route('profile') }}" class="{{ request()->routeIs('profile') ? 'active' : '' }}">Profile</a>
        <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a>

        <span class="spacer"></span>

        @auth
            <span class="who">{{ auth()->user()->full_name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}" style="margin-right:0">Login</a>
        @endauth
    </nav>
    <main>
        @if (session('success'))
            <div class="flash">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>
</body>
</html>