<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        Task::create([
            'user_id' => 1,
            'title' => 'Finish Laravel dashboard',
            'priority' => 'hard',
            'start_date' => now(),
            'end_date' => now()->addDays(3),
            'status' => 'in_progress',
        ]);

        Task::create([
            'user_id' => 1,
            'title' => 'Write weekly report',
            'priority' => 'medium',
            'start_date' => now(),
            'end_date' => now()->addDays(2),
            'status' => 'completed',
        ]);

        // Add more sample tasks here...
    }
}
