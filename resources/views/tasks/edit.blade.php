@extends('layouts.default')

@section('content')
<h1>Edit Task</h1>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="well well-small">
			<form class="form-horizontal" method="post" action="{!! url('tasks/'.$task->id) !!}">
				<fieldset>
				<input type="hidden" name="_method" value="PUT">
				{!! csrf_field() !!}

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
				    <a id="cancel" name="cancel" href="{!! url('tasks') !!}" class="btn btn-danger">Cancel</a>
				  </div>
				</div>

				</fieldset>

				
				</form>

		</div>
	</div>
</div>
@stop