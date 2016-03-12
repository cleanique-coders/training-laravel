<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');
Route::get('dashboard', 'HomeController@dashboard');
Route::get('report','ReportController@index');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(
	[
		'middleware' => [
			'web',
			'has_perm:_read-task,_create-task,_update-task,_delete-task'
		],
		'as' => 'admin::',
		'prefix' => 'admin'
	], function () {
    
	Route::get('task', 'TaskController@index');

	// get tasks based on status
	Route::get('task/status/{status}','TaskController@getTaskByStatus');

	// delete task based on provided id
	Route::get('task/delete/{id}', 'TaskController@destroy');

	// create task
	Route::get('task/add', 'TaskController@create');
	Route::post('task/store', 'TaskController@store');

	// update task
	Route::get('task/edit/{id}', 'TaskController@edit');
	Route::post('task/update', 'TaskController@update');

});
