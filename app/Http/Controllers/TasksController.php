<?php

namespace App\Http\Controllers;

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
}
