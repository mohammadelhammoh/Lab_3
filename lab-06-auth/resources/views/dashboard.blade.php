<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | IT Student Portal</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; display: grid; place-items: center; padding: 24px; font-family: Arial, sans-serif; background: #f1f5f9; color: #172033; }
        .panel { width: 100%; max-width: 650px; padding: 36px; border-radius: 18px; background: white; box-shadow: 0 12px 35px rgba(15, 23, 42, .10); }
        .badge { display: inline-block; padding: 6px 10px; border-radius: 999px; background: #dbeafe; color: #1e40af; font-size: 12px; font-weight: 700; }
        h1 { margin-bottom: 8px; }
        .muted { color: #64748b; }
        .details { margin-top: 25px; padding: 18px; background: #f8fafc; border-radius: 10px; }
        button { margin-top: 20px; padding: 12px 20px; border: 0; border-radius: 8px; background: #b91c1c; color: white; font-weight: 700; cursor: pointer; }
    </style>
</head>
<body>
<main class="panel">
    <span class="badge">AUTHENTICATED</span>
    <h1>IT Student Portal</h1>
    <p>Welcome, {{ auth()->user()->name }}.</p>
    <div class="details">
        <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
        <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
    </div>
    <p class="muted">You can see this page only while signed in.</p>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</main>
</body>
</html>
