<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
//     //echo 'welcome';
// });

// Route::get('/greet/{id}',function($id){
// 	echo 'greet'.$id;
// });

// Route::get(path,closure/controller);

/*
| From Route::get('',function(){})
| Route::get('/signage',ControllerName@method)
*/

Route::get('/','HomeController@index');
Route::get('/show','HomeController@show');
Route::get('/greet/{id}', 'HomeController@greet');

Route::resource('tasks', 'TasksController');


Route::auth();

Route::get('/home', 'HomeController@index');
