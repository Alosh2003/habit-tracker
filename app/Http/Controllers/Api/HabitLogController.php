<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Habit;
use App\Models\HabitLog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HabitLogController extends Controller
{
    public function upsert(Request $request, Habit $habit): JsonResponse
    {
        abort_unless($habit->user_id === $request->user()->id, 403);

        $validated = $request->validate([
            'date' => ['required', 'date'],
            'status' => ['required', 'in:completed,missed'],
            'notes' => ['nullable', 'string', 'max:255'],
        ]);

        $log = HabitLog::updateOrCreate(
            ['habit_id' => $habit->id, 'date' => $validated['date']],
            ['status' => $validated['status'], 'notes' => $validated['notes'] ?? null]
        );

        return response()->json($log);
    }
}
