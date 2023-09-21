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
        $task['title'] = $request->input('title');
        Modeltask::create($task);
        return redirect('/');
    }
    function edittask(Request $request, int $id)
    {
        $newTitle = $request->input('title');
        // dd($id);
        $task = Modeltask::find($id);
        $task['title'] = $newTitle;
        $task->save();
        return redirect('/');
    }
    function deleteTask(Request $request, int $id)
    {
        // dd('zarp');
        $task = Modeltask::find($id);
        $task->delete();
        return redirect('/');
    }
}