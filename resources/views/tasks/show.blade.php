@extends('layouts.default')

@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12 well well-small">
		<h1>{{ $task->name }}</h1>
		<p>{{ $task->description  }}</p>

		<a href="{!! url('tasks') !!}" class="btn btn-danger">Back to list</a>
	</div>
</div>
@stop