<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Task;
use App\User;

class HomeController extends Controller
{
    public function index()
    {
    	// test the connection to database
    	// dd(\DB::select('show tables'));

        // fetch the first data in Task Table
        // $data = Task::first();

        // find the first data, if not found, throw exception
        // $data = User::firstOrFail();

        // find data based on provided id, if not found, throw exception
        // $data = Task::findOrFail(1001);

        // firstOrFail() && findOrFail() is equivalent to the process below
        /*

        try {
            $result = db('select * from tasks where id = 1001');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        */
    
        // using where
        $data = Task::where('status','New')->get();

        dd($data);

    	return view('index');
    }

    public function dashboard()
    {
    	return view('dashboard.index');
    }
}
