# Habit Tracker

Modern habit-tracking SPA using **Laravel 12 (API)** + **Vue 3/Vite/TailwindCSS** with **MySQL** and **Sanctum authentication**.

## Delivered Project Structure

```text
app/
  Http/Controllers/Api/
    AuthController.php
    DashboardController.php
    ExportController.php
    HabitController.php
    HabitLogController.php
  Models/
    User.php
    Habit.php
    HabitLog.php
    Category.php
database/
  migrations/
  seeders/
routes/
  api.php
frontend/
  src/
    components/
    layouts/
    pages/
docs/
  API.md
  INSTALL.md
```

## Core Features Implemented

- User registration/login/logout token flow via Sanctum-ready controller endpoints.
- Habit CRUD with frequency support (`daily`, `weekly`, `custom`).
- Habit log upsert endpoint for clickable calendar cell state updates.
- Dashboard summary API with streak analytics.
- CSV export endpoint.
- Vue SPA routes for dashboard, habits, login, and register screens.
- Habit grid component (GitHub-style contribution matrix).
- Weekly progress bar chart component using Chart.js.
- Tailwind dark mode ready UI foundation.
- Seeders for categories + demo habit/log data.

## Database Schema

See migration files for exact definitions:
- `categories`: name, color
- `habits`: user relation, title/description, category, frequency, target_days, reminder_time
- `habit_logs`: habit relation, date, status (`completed`, `missed`), notes

## Docs

- API endpoints and payload samples: `docs/API.md`
- Install/run instructions: `docs/INSTALL.md`
