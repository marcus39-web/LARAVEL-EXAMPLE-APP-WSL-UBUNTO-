<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->cookie('user_id');
        $user = User::find($userId);
        $tasks = $user ? $user->tasks : collect();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $userId = $request->cookie('user_id');
        $user = User::find($userId);
        if ($user) {
            $task = Task::create($request->only('title', 'description'));
            $user->tasks()->attach($task);
            $request->session()->flash('status', 'Task added successfully!');
        }
        return redirect()->route('tasks.index');
    }

    public function destroy(Request $request, $id)
    {
        $userId = $request->cookie('user_id');
        $user = User::find($userId);
        if ($user) {
            $task = Task::find($id);
            $user->tasks()->detach($task);
            $task->delete();
            $request->session()->flash('status', 'Task deleted successfully!');
        }
        return redirect()->route('tasks.index');
    }
}
