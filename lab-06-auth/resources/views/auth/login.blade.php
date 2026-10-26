<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | IT Student Portal</title>
    <style>
        * { box-sizing: border-box; }
        body { margin: 0; min-height: 100vh; display: grid; place-items: center; padding: 24px; font-family: Arial, sans-serif; background: #f1f5f9; color: #172033; }
        .card { width: 100%; max-width: 460px; padding: 32px; border-radius: 16px; background: #fff; box-shadow: 0 12px 35px rgba(15, 23, 42, .10); }
        h1 { margin-top: 0; font-size: 27px; }
        .subtitle { color: #64748b; margin-bottom: 24px; }
        label { display: block; margin: 16px 0 7px; font-weight: 700; }
        input { width: 100%; padding: 12px 13px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 15px; }
        input:focus { outline: 2px solid #93c5fd; border-color: #2563eb; }
        button { width: 100%; margin-top: 22px; padding: 13px; border: 0; border-radius: 8px; background: #1d4ed8; color: white; font-weight: 700; font-size: 15px; cursor: pointer; }
        a { color: #1d4ed8; }
        .foot { margin-bottom: 0; text-align: center; }
        .errors { background: #fef2f2; color: #991b1b; border-radius: 8px; padding: 12px 12px 12px 30px; }
        .success { background: #f0fdf4; color: #166534; padding: 12px; border-radius: 8px; }
    </style>
</head>
<body>
<main class="card">
    <h1>Welcome back</h1>
    <p class="subtitle">Sign in to your IT Student Portal.</p>

    @if ($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('login.store') }}">
        @csrf
        <label for="email">Email address</label>
        <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email">

        <label for="password">Password</label>
        <input id="password" name="password" type="password" required autocomplete="current-password">

        <button type="submit">Login</button>
    </form>
    <p class="foot">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
</main>
</body>
</html>
