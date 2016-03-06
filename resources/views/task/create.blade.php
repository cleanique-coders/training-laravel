@extends('laravel-authentication-acl::admin.layouts.base-1cols')

@section('content')

	<div class="well well-small">
		<form class="form-horizontal" method="post" action="/admin/task/store">
			<fieldset>

			{!! csrf_field() !!}

			<!-- Form Name -->
			<legend>Add Task</legend>

			<!-- Text input-->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="name">Task Name</label>  
			  <div class="col-md-4">
			  <input id="name" name="name" type="text" placeholder="your task" class="form-control input-md" required="" value="">
			  </div>
			</div>

			<!-- Textarea -->
			<div class="form-group">
			  <label class="col-md-4 control-label" for="description">Description</label>
			  <div class="col-md-4">                     
			    <textarea rows="7" class="form-control" id="description" name="description"></textarea>
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

			</form>

	</div>

@stop