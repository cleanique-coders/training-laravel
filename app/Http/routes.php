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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/admin/task','TaskController@index');
// Route::get('/admin/task/{id}','TaskController@show');
// //Route::get('/admin/task/edit/{id}','TaskController@edit');
// Route::post('/admin/task/update', 'TaskController@update');
// Route::get('/admin/task/delete/{id}','TaskController@delete');

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

Route::group(['middleware' => ['web', 'has_perm:_task-editor']], function () {
    Route::get('/admin/task','TaskController@index');
	Route::get('/admin/task/show/{id}','TaskController@show');
	Route::get('/admin/task/edit/{id}','TaskController@edit');
	Route::get('/admin/task/delete/{id}','TaskController@delete');
	
	// display add new task form
	Route::get('/admin/task/create', [
		'as' => 'addTask', 
		'uses' => 'TaskController@create'
	]);

	// update task data
	Route::post('/admin/task/update', 'TaskController@update');

	// save the input. create new record
	Route::post('/admin/task/store', 'TaskController@store');

});
