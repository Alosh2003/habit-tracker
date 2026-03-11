<?php

namespace Database\Seeders;

use App\Models\Habit;
use App\Models\HabitLog;
use App\Models\User;
use Carbon\CarbonPeriod;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([CategorySeeder::class]);

        $user = User::firstOrCreate(
            ['email' => 'demo@habittracker.app'],
            ['name' => 'Demo User', 'password' => Hash::make('password')]
        );

        $habit = Habit::firstOrCreate(
            ['user_id' => $user->id, 'title' => 'Morning Walk'],
            ['frequency' => 'daily']
        );

        $period = CarbonPeriod::create(now()->subDays(21), now());
        foreach ($period as $date) {
            HabitLog::updateOrCreate(
                ['habit_id' => $habit->id, 'date' => $date->toDateString()],
                ['status' => rand(0, 100) > 25 ? 'completed' : 'missed']
            );
        }
    }
}
