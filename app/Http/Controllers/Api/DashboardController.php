<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function stats(Request $request): JsonResponse
    {
        $user = $request->user();
        $today = Carbon::today()->toDateString();

        $habits = $user->habits()->with('logs')->get();
        $totalHabits = $habits->count();

        $completedToday = $habits->sum(fn ($habit) => $habit->logs->where('date', $today)->where('status', 'completed')->count());
        $longestStreak = $habits->map(fn ($habit) => $this->calculateLongestStreak($habit->logs))->max() ?? 0;

        return response()->json([
            'summary' => [
                'total_habits' => $totalHabits,
                'completed_today' => $completedToday,
                'longest_streak' => $longestStreak,
            ],
        ]);
    }

    private function calculateLongestStreak($logs): int
    {
        $sorted = $logs->where('status', 'completed')->sortBy('date')->pluck('date')->map(fn ($date) => Carbon::parse($date));
        $longest = 0;
        $current = 0;
        $previous = null;

        foreach ($sorted as $day) {
            if ($previous && $previous->copy()->addDay()->isSameDay($day)) {
                $current++;
            } else {
                $current = 1;
            }

            $longest = max($longest, $current);
            $previous = $day;
        }

        return $longest;
    }
}
