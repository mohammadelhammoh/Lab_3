# IT Student Portal — Laravel 12 Authentication Lab

This is the completed source-code solution for the Lab-06 Laravel Authentication assignment.

## Requirements
- PHP 8.2+
- Composer
- MySQL
- Laravel 12

## Setup
1. Create a Laravel 12 project:
   ```bash
   composer create-project laravel/laravel it-auth-lab "^12.0"
   ```
2. Copy the files from this ZIP into the matching paths in the Laravel project, replacing `routes/web.php` and creating the view/controller files.
3. In phpMyAdmin, create a database named `it_auth_lab`.
4. Update `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=it_auth_lab
   DB_USERNAME=root
   DB_PASSWORD=
   SESSION_DRIVER=file
   ```
5. Run:
   ```bash
   php artisan config:clear
   php artisan migrate
   php artisan serve
   ```
6. Open `http://127.0.0.1:8000`.

## Included
- `routes/web.php`: guest/auth route groups and named routes
- `app/Http/Controllers/AuthController.php`: register, login, logout
- `resources/views/auth/register.blade.php`: registration form
- `resources/views/auth/login.blade.php`: login form
- `resources/views/dashboard.blade.php`: authenticated dashboard

## Notes
This ZIP contains the lab solution files, not a full Laravel framework installation or `vendor/` directory. Copy them into a fresh Laravel 12 project as described above.
