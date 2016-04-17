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
	migrations
		create model + migration script
			`php artisan make:model SingularAndCamelCase -m`
		create migration script only
			`php artisan make:migration create_name_table --create=name`
		create update migration script
			`php artisan make:migration update_name_table --table=name`
	factories
		define how factory should create our data
	seeds
		create seed file
			`php artisan make:seeder TableNameSeeder`
		define how much records to create
		call `TableNameSeeder` in `DatabaseSeeder.php`
		For Seeding
			`php artisan db:seed`

# Eloquent
	How to create model
		`php artisan make:model SingularAndCamelCase`
		`php artisan make:model ModelFolder\SingularAndCamelCase`
	Basic Queries
		Usage
			Include namespace before use the model like `use App\Task;`
		Create
			`$task = new Task;
			$task->name = $request->input('name');
			$task->description = $request->input('description')
			$task->save();`
		Read
			`Task:all();
			Task::orderBy('created_at','desc')->paginate(25);
			$tasks->render();
			TaskController@show`
		Update
			`$task = Task::find($id);
			$task->name = $request->input('name');
	        $task->description = $request->input('description');
	        $task->save();`
		Delete
			https://gist.github.com/khairahmanplus
			Task::destroy($id);
	Relationships - one-to-many

		STEP 1 - Database
		Add Foreign Key in users table
			`php artisan make:migration update_tasks_table --table=tasks`
		Add new column ``user_id``, after ``id`` column in update_tasks_table migration script
			$table->integer('user_id')->after('id');
		Update Model Factory
			Add ``'user_id' => rand(1,10)`` in Task factory
		Create new UserSeeder 
			`php artisan make:seeder UserSeeder`
			use App\User;

			User::truncate();
			factory(User::class, 10)->create();
			$this->command->info('Users data seeded');

		STEP 2 - Model
		Add Relationships
			hasMany
				public function plural() {
					return $this->hasMany('Model\Name\Space');
				}
			belongsTo
				public function singular() {
					return $this->belongsTo('Model\Name\Space');
				}

		STEP 3 - Load related model
		Query
			Eager
				Task::with('user')->orderBy('created_at','desc')->paginate(25);
			Lazy
				$task->load('user');

		STEP 4 - Use in view
		Accessing the relationship model
			`$task->user->name;`
			`$tasks = $user->tasks;`

# Flash - laracasts/flash

	`composer require laracasts/flash`

	`'providers' => [
    	Laracasts\Flash\FlashServiceProvider::class,
	];`

	`'aliases' => [
	    'Flash' => Laracasts\Flash\Flash::class
	];`

	include Flash view in our own layouts by adding the following
		@include('flash::message')

	For overlay, add the following after Bootstrap script is loaded
		<!-- This is only necessary if you do Flash::overlay('...') -->
		<script>
		    $('#flash-overlay-modal').modal();
		</script>

	To customize the flash message
		`php artisan vendor:publish`

# Git Slides

http://bit.ly/cc-git-slide
