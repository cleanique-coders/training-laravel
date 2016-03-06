<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Task;
use App\User;

class TaskController extends Controller
{
    public function index() 
    {
        $user = \App::make('authenticator')->getLoggedUser();

        $sidebar = [
            'Add New' => [
                'url' => route('addTask'),
                'icon' => '<i class="fa fa-plus-circle"></i>'
            ]
        ];
        $tasks = \App\User::find($user->id)->tasks()->paginate(15);

    	return view('task.index')->with(
            [
                'tasks' => $tasks, 
                'sidebar_items' => $sidebar
            ]);
    }

    public function show($id) 
    {
    	$task = Task::find($id);

    	return view('task.show')->with('task',$task);
    }

    public function create() {
        return view('task.create');
    }

    public function edit($id)
    {
        $task = Task::find($id);

        return view('task.edit')->with('task',$task);
    }

    public function store(Request $request) 
    {
        if($request->isMethod('post')) 
        {
            $user = \App::make('authenticator')->getLoggedUser();
            $task = new Task;
            $task->user_id = $user->id;
            $task->name = $request->input('name');
            $task->description = $request->input('description');
            $task->save();
        } 
        
        return redirect('/admin/task');
    }

    public function update(Request $request) 
    {
    	if($request->isMethod('post')) 
    	{
            $id = $request->input('id');
    		$task = Task::find($id);
            $task->name = $request->input('name');
            $task->description = $request->input('description');
            $task->save();
    	} 
        
        return redirect('/admin/task');
    }

    public function delete($id)
    {
    	Task::destroy($id);
        return redirect('/admin/task');
    }
}
