@extends('layouts.admin')

@section('content')
	<h1>Task Name: {{ $task->name }}</h1>

	<p>{{ $task->description }}</p>

	<a href="{!! url('tasks') !!}" class="btn btn-danger">Back to list</a>
@stop