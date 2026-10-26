Laravel Beginner Lab 1 - Solution

1. Create the Laravel 12 project:
   cd /d "%USERPROFILE%"
   composer create-project laravel/laravel laravel-lab "12.*"

2. Copy the files from this ZIP into the corresponding folders:
   routes/web.php
   resources/views/home.blade.php
   resources/views/about.blade.php

3. In your Laravel project's .env file, make sure these values exist:
   SESSION_DRIVER=file
   CACHE_STORE=file

4. If APP_KEY is empty, run:
   php artisan key:generate

5. Inside the laravel-lab folder run:
   php artisan config:clear
   php artisan serve

6. Open:
   http://127.0.0.1:8000
   http://127.0.0.1:8000/about

IMPORTANT:
Replace "Your Full Name" and "Your Student ID" in home.blade.php and about.blade.php with your real details.

This ZIP contains the lab solution files, not the Laravel vendor/dependency folder.
