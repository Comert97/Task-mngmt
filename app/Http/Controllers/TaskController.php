<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
   
    public function index()
    {
        $tasks = Task::where('user_id', auth()->id())->get();
        return view('tasks.index', compact('tasks'));
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

    // Decide status based on dates
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


    // Edit an existing task
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

        return redirect('dashboard')->with('Success','Task Updated!');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('dashboard')->with('Success','Task Deleted!');
    }












}
