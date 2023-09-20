<?php

namespace App\Http\Controllers;

use App\Models\tasks as Modeltask;
use Illuminate\Http\Request;

class tasks extends Controller
{
    function index()
    {
        return view('main', [
            'tasks' => Modeltask::all()
        ]);
    }
    function addtask(Request $request)
    {
        // dd($request->input('title'));
        // $task=Modeltask();
        $task['title']=$request->input('title');
        Modeltask::create($task);
        return redirect('/');
        
    }
}