# Habit Tracker API (Laravel 12 + Sanctum)

## Auth
- `POST /api/auth/register`
- `POST /api/auth/login`
- `POST /api/auth/logout` (auth)

## Dashboard
- `GET /api/dashboard/stats` (auth)

## Habits
- `GET /api/habits` (auth)
- `POST /api/habits` (auth)
- `PUT /api/habits/{habit}` (auth)
- `DELETE /api/habits/{habit}` (auth)
- `POST /api/habits/{habit}/logs` (auth)

## Utilities
- `GET /api/export/csv` (auth)

## Request samples
### Create habit
```json
{
  "title": "Read 20 minutes",
  "description": "Read any non-fiction",
  "category_id": 1,
  "frequency": "daily",
  "target_days": [1,2,3,4,5],
  "reminder_time": "07:30"
}
```

### Upsert habit log
```json
{
  "date": "2026-01-20",
  "status": "completed",
  "notes": "Done before breakfast"
}
```
