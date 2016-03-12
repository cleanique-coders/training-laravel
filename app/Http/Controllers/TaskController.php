<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Task;

class TaskController extends Controller
{
    public function index()
    {
    	return view('task.index');
    }

    public function getTaskByStatus($status)
    {
        $user = \App::make('authenticator')->getLoggedUser();

        $list = \App\User::find($user->id)
                        ->tasks()
                        ->paginate(15);
        $sidebar = [
            'Add New' => [
                'url' => url('admin/task/add'),
                'icon' => '<i class="fa fa-plus-circle"></i>'
            ]
        ];

        $can_delete = \App::make('authentication_helper')->hasPermission(['_delete-task']);

    	// $list = Task::where('status', $status)
    	// 	->orderBy('created_at','desc')
    	// 	->paginate(15);
    	
    	return view('task.list')->with([
            'senarai' => $list,
            'sidebar_items' => $sidebar,
            'can_delete' => $can_delete
        ]);
    }

    public function destroy($id)
    {
    	Task::destroy($id);
    	return redirect('admin/task/status/New');
    }

    public function create()
    {
    	// to display add new task form
    	return view('task.create');
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

    	return redirect('admin/task/status/New');
    }

    public function edit($id)
    {
        $task = Task::find($id);

        return view('task.edit')->with('task',$task);
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
        
        return redirect('admin/task/status/New');
    }
}
