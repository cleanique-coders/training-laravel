@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('content')

	<div class="well well-small">
		<h1>{{ $task->name }}</h1>
		<p>{{ $task->description  }}</p>
	</div>

@stop