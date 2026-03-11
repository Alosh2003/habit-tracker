# Installation Guide

## Backend
1. Create a Laravel 12 app and copy this project structure into it.
2. Install dependencies:
   - `composer install`
   - `php artisan key:generate`
3. Configure MySQL in `.env`.
4. Install Sanctum: `php artisan install:api`
5. Run migrations and seeds:
   - `php artisan migrate --seed`
6. Start backend: `php artisan serve`

## Frontend
1. `cd frontend`
2. `npm install`
3. `npm run dev`

## Optional features
- Queue worker for reminders and weekly email reports.
- Scheduler for weekly report command.
- Notification channels (mail/database) for reminder delivery.
