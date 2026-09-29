<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My First Laravel Page</title>
</head>
<body>
    <h1>Welcome to My Laravel Website</h1>
    <p>Student: muhammad elham muhammadi</p>
    <p>Student ID: 01013305</p>
    <p>Course: {{ $course }}</p>
    <p>This is my first Blade view.</p>

    <a href="{{ url('/about') }}">About Me</a>
</body>
</html>
