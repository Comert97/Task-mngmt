<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LeaderboardController extends Controller
{
    public function index()
    {
        $users = User::withCount(['tasks' => function($query) {
            $query->where('status', 'completed')
                  ->whereBetween('completed_at', [now()->subMinutes(15), now()]);
        }])->orderBy('tasks_count', 'desc')->get();

        // Fallback: if no recent completions, show all-time leaders
        if ($users->isEmpty()) {
            $users = User::withCount(['tasks' => function($query) {
                $query->where('status', 'completed');
            }])->orderBy('tasks_count', 'desc')->get();
        }

        return view('leaderboard', compact('users'));
    }
}
