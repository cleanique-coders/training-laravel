@extends('layouts.default')

@section('content')
	<div class="well well-small">
		<h1>{{ $task->name }}</h1>
		<p>{{ $task->description  }}</p>
	</div>
@stop