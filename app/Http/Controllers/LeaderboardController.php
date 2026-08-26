<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WeeklyResult;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
   public function index()
{
   $users = User::withCount(['tasks' => function($query) {
    $query->where('status', 'Completed')
          ->whereBetween('completed_at', [now()->subMinute(15), now()]);
}])->orderBy('tasks_count', 'desc')->get();

if ($users->isEmpty()) {
    $users = User::withCount(['tasks' => function($query) {
        $query->where('status', 'Completed');
    }])->orderBy('tasks_count', 'desc')->get();
}

    return view('leaderboard', compact('users', 'weeklyResults'));
}

}
