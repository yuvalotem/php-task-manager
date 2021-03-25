<?php

namespace App\Http\Controllers;
use App\Models\Task as Task;
use App\Models\User as User;

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

        auth()->user()->tasks()->create($data);

        return redirect('/home/'. auth()->user()->id);
    }

    public function edit(Task $task)
    {
        if($task->user_id == auth()->user()->id){
            return view('tasks.edit', compact('task'));
        }else{
            return redirect('/home/'. auth()->user()->id);
        }
        // dd(auth()->user()->tasks()->where('id', $task->id));
        // foreach (auth()->user()->tasks() as $t) {
        //     if($task->id == $t->id){
        //         return view('tasks.edit', compact('task'));
        //     }
        // }
        // return redirect('/home/'. auth()->user()->id);
    }

    public function check($id, $status)
    {
        $data =[ "status" => !$status ];

        auth()->user()->tasks()->where('id', $id)->update($data);

        return redirect('/home/'. auth()->user()->id);
    }

    public function update($id)
    {
        $data = request()->validate([
            "task" => "",
            "deadline" => "",
            "status" => ""
        ]);
        $data['status'] = $data['status'] == "1";

        auth()->user()->tasks()->where('id', $id)->update($data);

        return redirect('/home/'. auth()->user()->id);
    }

    public function delete($id)
    {
        auth()->user()->tasks()->where('id', $id)->delete();

        return redirect('/home/'. auth()->user()->id);
    }
}
