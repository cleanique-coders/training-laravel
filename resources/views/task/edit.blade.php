@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('content')

	<div class="well well-small">
		<form class="form-horizontal" method="post" action="/admin/task/update">
			<fieldset>

			<!-- Form Name -->
			<legend>Edit Task</legend>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="name">Task Name</label>  
			  <div class="col-md-4">
			  <input id="name" name="name" type="text" placeholder="your task" class="form-control input-md" required="" value="{{ $task->name }}">
			  </div>
			</div>

			<!-- Textarea -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="description">Description</label>
			  <div class="col-md-4">                     
			    <textarea rows="7" class="form-control" id="description" name="description">{{ $task->description }}</textarea>
			  </div>
			</div>

			<!-- Button (Double) -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="submit"></label>
			  <div class="col-md-8">
			    <button id="submit" name="submit" class="btn btn-success">Save</button>
			    <a id="cancel" name="cancel" href="#" class="btn btn-danger" onclick="window.location = '/admin/task'">Cancel</a>
			  </div>
			</div>

			</fieldset>

			<input type="hidden" name="id" value="{{ $task->id }}">
			</form>

	</div>

@stop