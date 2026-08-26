<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
   public function index()
{
    $userId = auth()->id();

    // Get all tasks for the logged-in user
    $tasks = Task::where('user_id', $userId)->get();

    // Group tasks by status
    $notStarted = $tasks->where('status', 'not_started');
    $inProgress = $tasks->where('status', 'in_progress');
    $completed  = $tasks->where('status', 'completed');

    // Totals
    $totalTasks     = $tasks->count();
    $completedTasks = $completed->count();
    $progress       = $totalTasks > 0 ? round(($completedTasks / $totalTasks) * 100) : 0;

    // Pass everything to the view
    return view('tasks.index', compact(
        'tasks',
        'notStarted',
        'inProgress',
        'completed',
        'totalTasks',
        'completedTasks',
        'progress'
    ));
}


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'priority' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $today = now()->toDateString();

        if ($request->start_date > $today) {
            $status = 'not_started';
        } elseif ($request->end_date < $today) {
            $status = 'completed';
        } else {
            $status = 'in_progress';
        }

        Task::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'priority' => $request->priority,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status' => $status,
        ]);

        return redirect()->route('home')->with('success', 'Task created!');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required',
            'priority' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $task->update($request->all());

        // ✅ Redirect to home instead of dashboard
        return redirect()->route('home')->with('success', 'Task Updated!');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        // ✅ Redirect to home instead of dashboard
        return redirect()->route('home')->with('success', 'Task Deleted!');
    }
}
