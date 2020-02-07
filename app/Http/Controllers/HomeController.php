<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Tasks;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     *
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     * @param \Illuminate\Http\Request  $request
     * @param int $days
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

                if(Session::has('result')){
                    $result =  Session::get('result') + Session::get('days');
                    Session::put('result', $result);
                    Session::forget('days');
                }else{
                    Session::put('result', 0);
                }
        $currentDay =  Carbon::now()->format('d-M-Y');
        $dayToDisplay = Carbon::now()->subDays(Session::get('result'))->format('d-M-Y');



        $tasksArray = Tasks::GetTasks(Auth::id(), Carbon::now()->subDays(Session::get('result'))->format('Y-m-d'))->get()->toArray();

        $counter = 0;
        foreach ($tasksArray as $task){

            if ($task['status'] == 'Завършена'){
                $counter++;
            }
        }
            return view('home')->with([
                'tasksArray'=> $tasksArray,
                'dayToDisplay'=>$dayToDisplay,
                'currentDay' => $currentDay,
                'counter' => $counter,
            ]);
    }

    public function change(Request $request){

        $days = (int)$request->days;

        $request->session()->put([
            'days' => $days,
        ]);
         return json_encode('Success');

//
    }




}
