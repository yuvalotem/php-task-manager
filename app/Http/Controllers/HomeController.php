<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($user)
    {
        if($user == auth()->user()->id){
            $user = User::findOrFail($user);
            return view('home.index', [
                'user' => $user
            ]);
        }else{
            return redirect('/home/'. auth()->user()->id);
        }
    }
}
