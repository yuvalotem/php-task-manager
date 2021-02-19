<?php

namespace App\Http\Controllers;
use App\Models\Task as Task;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function __construct()
    {
        $this -> middleware('auth');
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store()
    {
        $data = request()->validate([
            "task" => "required",
            "deadline" => ["required", 'date']
        ]);
        $data['status'] = false;

        auth()->user()->task()->create($data);

        return redirect('/home/'. auth()->user()->id);
    }

    public function edit(Task $task)
    {
        // return dd($task);
        return view('tasks.edit', compact('task'));
    }
    public function update($task)
    {
        dd($task);
        // $task = Task::where('id', $id);
        // $task->update(array('status' => !$task));
        // return redirect('/home/'. auth()->user()->id);
    }
}
