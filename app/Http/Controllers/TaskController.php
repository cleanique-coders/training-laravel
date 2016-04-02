<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

// Step 1
use App\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Task List';

        // Step 2
        // $tasks = Task::all();
        $tasks = Task::with('user')->orderBy('created_at','desc')->paginate(5);
        return view('task.index',
            [
                'title' => $title,

                // Step 3
                'tasks' => $tasks
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Task';
        return view('task.create',['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->isMethod('post')) 
        {
            $task = new Task;
            $task->name = $request->input('name');
            $task->description = $request->input('description');
            $task->save();
        } 

        return redirect('task');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id); // select * from tasks where id = 1
        $title = 'Show Task';
        return view('task.show',['title' => $title,'id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Task';
        $task = Task::find($id);
        return view('task.edit',[
            'title' => $title,
            'task' => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->save(); 
        
        return redirect('task');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::destroy($id);
        return redirect('task');
    }
}
