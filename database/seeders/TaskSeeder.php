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
            'start_date' => now()->subDays(2),
            'end_date' => now()->addDay(),
            'status' => 'in_progress',
        ]);

        Task::create([
            'user_id' => 1,
            'title' => 'Write weekly report',
            'priority' => 'medium',
            'start_date' => now()->subDay(),
            'end_date' => now(),
            'status' => 'completed',
        ]);

     
        Task::create([
            'user_id' => 2,
            'title' => 'Prepare presentation',
            'priority' => 'hard',
            'start_date' => now()->subHours(3),
            'end_date' => now(),
            'status' => 'completed',
        ]);

        Task::create([
            'user_id' => 2,
            'title' => 'Update project documentation',
            'priority' => 'medium',
            'start_date' => now(),
            'end_date' => now()->addDays(2),
            'status' => 'in_progress',
        ]);

        Task::create([
            'user_id' => 3,
            'title' => 'Fix bug in login system',
            'priority' => 'hard',
            'start_date' => now()->subHours(1),
            'end_date' => now(),
            'status' => 'completed',
        ]);

        Task::create([
            'user_id' => 3,
            'title' => 'Design new landing page',
            'priority' => 'medium',
            'start_date' => now(),
            'end_date' => now()->addDays(3),
            'status' => 'in_progress',
        ]);
    }
}
