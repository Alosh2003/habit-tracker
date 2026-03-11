<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Habit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HabitController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $habits = $request->user()
            ->habits()
            ->with(['category', 'logs' => fn ($query) => $query->latest('date')->limit(31)])
            ->latest()
            ->get();

        return response()->json($habits);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:120'],
            'description' => ['nullable', 'string'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'frequency' => ['required', 'in:daily,weekly,custom'],
            'target_days' => ['nullable', 'array'],
            'target_days.*' => ['integer', 'min:0', 'max:6'],
            'reminder_time' => ['nullable', 'date_format:H:i'],
        ]);

        $habit = $request->user()->habits()->create($validated);

        return response()->json($habit->load('category'), 201);
    }

    public function update(Request $request, Habit $habit): JsonResponse
    {
        $this->authorizeHabit($request, $habit);

        $validated = $request->validate([
            'title' => ['sometimes', 'required', 'string', 'max:120'],
            'description' => ['nullable', 'string'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'frequency' => ['sometimes', 'required', 'in:daily,weekly,custom'],
            'target_days' => ['nullable', 'array'],
            'target_days.*' => ['integer', 'min:0', 'max:6'],
            'reminder_time' => ['nullable', 'date_format:H:i'],
        ]);

        $habit->update($validated);

        return response()->json($habit->refresh()->load('category'));
    }

    public function destroy(Request $request, Habit $habit): JsonResponse
    {
        $this->authorizeHabit($request, $habit);
        $habit->delete();

        return response()->json(status: 204);
    }

    private function authorizeHabit(Request $request, Habit $habit): void
    {
        abort_unless($habit->user_id === $request->user()->id, 403, 'Unauthorized habit.');
    }
}
