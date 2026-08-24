<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $notStarted = Task::where('user_id', $userId)->where('status', 'not_started')->get();
        $inProgress = Task::where('user_id', $userId)->where('status', 'in_progress')->get();
        $completed  = Task::where('user_id', $userId)->where('status', 'completed')->get();

        $totalTasks = Task::where('user_id', $userId)->count();
        $completedTasks = $completed->count();
        $progress = $totalTasks > 0 ? round(($completedTasks / $totalTasks) * 100) : 0;

        $weeklyCompleted = Task::where('user_id', $userId)
            ->where('status', 'completed')
            ->whereBetween('updated_at', [now()->startOfWeek(), now()->endOfWeek()])
            ->get();

        return view('dashboard', compact(
            'notStarted',
            'inProgress',
            'completed',
            'totalTasks',
            'completedTasks',
            'progress',
            'weeklyCompleted'
        ));
    }
}
