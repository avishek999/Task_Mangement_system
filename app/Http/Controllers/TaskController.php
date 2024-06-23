<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Auth;

class TaskController extends Controller
{
    /**
     * Show the form for creating a new task.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Display a listing of tasks.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        
        $statusMap = [
            Task::STATUS_PENDING => 'Pending',
            Task::STATUS_IN_PROGRESS => 'In Progress',
            Task::STATUS_COMPLETED => 'Completed',
        ];
    
        return view('home.home', compact('tasks', 'statusMap'));
    }

    /**
     * Store a newly created task in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'deadline' => 'required|date',
            'status' => 'required|string|in:pending,in_progress,completed',
        ]);
    
        $statusMap = [
            'pending' => Task::STATUS_PENDING,
            'in_progress' => Task::STATUS_IN_PROGRESS,
            'completed' => Task::STATUS_COMPLETED,
        ];
    
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'deadline' => $request->deadline,
            'status' => $statusMap[$request->status],
            'user_id' => Auth::id(), 
        ]);
    
        return redirect()->route('home')->with('success', 'Task created successfully.');
    }
    

    /**
     * Remove the specified task from storage.
     *
     * @param \App\Models\Task $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('home')->with('success', 'Task deleted successfully.');
    }

    /**
     * Show the form for editing the specified task.
     *
     * @param \App\Models\Task $task
     * @return \Illuminate\View\View
     */
    public function edit(Task $task)
    {
        return view('tasks.update', compact('task'));
    }

    /**
     * Update the specified task in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'deadline' => 'required|date',
            'status' => 'required|string|in:pending,in_progress,completed',
        ]);
    
        $statusMap = [
            'pending' => Task::STATUS_PENDING,
            'in_progress' => Task::STATUS_IN_PROGRESS,
            'completed' => Task::STATUS_COMPLETED,
        ];
    
        $task = Task::findOrFail($id);
        $task->title = $request->title;
        $task->description = $request->description;
        $task->deadline = $request->deadline;
        $task->status = $statusMap[$request->status];
        $task->save();
    
        return redirect()->route('home')->with('success', 'Task updated successfully.');
    }
    
}
