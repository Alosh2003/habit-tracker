<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Health', 'color' => '#22c55e'],
            ['name' => 'Learning', 'color' => '#3b82f6'],
            ['name' => 'Mindfulness', 'color' => '#a855f7'],
            ['name' => 'Fitness', 'color' => '#f97316'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['name' => $category['name']], $category);
        }
    }
}
