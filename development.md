# Create project
	composer create...

# Laragon - virtual host ready
	- training.dev
	- training.dev:82
	- Open Up commander
		go to project folder
		run `php artisan serve`
		browser app at browser http://localhost:8000

# Setup .env
	- create database via PHPMyAdmin / SQLYog / Sequel Pro
	- setup database connection in `.env`

# Route - app/Http/routes.php
	`Route::[get/post]('/path/{id}',closure | controller@method);`
		Route::get('/login','AuthController@login');
		Route::post('/register','AuthController@register');
	`Route::resource('path', 'PluralsAndCamelCaseController');
	Check route list `php artisan route:list`

# Controller
	`php artisan make:controller PluralsAndCamelCaseController`
	`php artisan make:controller PluralsAndCamelCaseController --resource`

# View
	Include in Controller@method 
		`return view('view.name');`
	If need to pass variables/data to view use second parameter
		`return view('view.name',['title' => 'my title']);`

# Blade Template
	{{ $title }} - echo
	{{ $title or 'Default' }} - echo with default value
	@yield('content') - output the content
	@extends('layouts.index')
	@section('content') & @stop

# Database
	factories
		define how factory should create our data
	migrations
		create model + migration script
			`php artisan make:model SingularAndCamelCase -m`
		create migration script only
			`php artisan make:migration create_name_table --create=name`
		create update migration script
			`php artisan make:migration update_name_table --table=name`
	seeds
		create seed file
			`php artisan make:seeder TableNameSeeder`
		define how much records to create
		call `TableNameSeeder` in `DatabaseSeeder.php`
		For Seeding
			`php artisan db:seed`

# Eloquent
	Basic Queries
		Usage
			Include namespace before use the model like `use App\Task;`
		Create
		Read
			Task:all();
			paginate();
			render();
		Update
		Delete
	Relationships - one-to-many

# Git Slides

http://bit.ly/cc-git-slide
