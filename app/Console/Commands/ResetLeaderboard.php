<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ResetLeaderboard extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reset-leaderboard';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
   public function handle()
{
    $users = User::withCount(['tasks' => function($query) {
        $query->where('status', 'Completed')
              ->whereBetween('completed_at', [now()->startOfWeek(), now()->endOfWeek()]);
    }])->get();

    foreach ($users as $user) {
        WeeklyResult::create([
            'user_id' => $user->id,
            'tasks_completed' => $user->tasks_count,
            'week_start' => now()->startOfWeek(),
            'week_end' => now()->endOfWeek(),
        ]);
    }

    $this->info('Leaderboard archived and reset!');
}

}
