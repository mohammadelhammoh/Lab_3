<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an Account | IT Student Portal</title>
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
    </style>
</head>
<body>
<main class="card">
    <h1>Create an account</h1>
    <p class="subtitle">Create your IT Student Portal account.</p>

    @if ($errors->any())
        <ul class="errors">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('register.store') }}">
        @csrf
        <label for="name">Full name</label>
        <input id="name" name="name" type="text" value="{{ old('name') }}" required autocomplete="name">

        <label for="email">Email address</label>
        <input id="email" name="email" type="email" value="{{ old('email') }}" required autocomplete="email">

        <label for="password">Password (minimum 8 characters)</label>
        <input id="password" name="password" type="password" required minlength="8" autocomplete="new-password">

        <label for="password_confirmation">Confirm password</label>
        <input id="password_confirmation" name="password_confirmation" type="password" required minlength="8" autocomplete="new-password">

        <button type="submit">Register</button>
    </form>
    <p class="foot">Already have an account? <a href="{{ route('login') }}">Log in</a></p>
</main>
</body>
</html>
