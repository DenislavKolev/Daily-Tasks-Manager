<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Tasks;

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
    public function index()
    {
        $currentDay = Carbon::now()->format('m-d-Y');

        $tasksArray = Tasks::GetTasks(Auth::id(), Carbon::now()->format('Y-m-d'))->get()->toArray();
        return view('home')->with([
            'tasksArray'=> $tasksArray,
            'currentDay' => $currentDay,
            ]);
    }
}
