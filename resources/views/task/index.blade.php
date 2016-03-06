@extends('laravel-authentication-acl::admin.layouts.base-1cols')

@section('title')
Admin area: dashboard
@stop

@section('content')

	<div class="well well-small">
		  <a href="{{ route('addTask') }}" class="btn btn-success pull-right">Add</a>
	    <table class="table table-striped table-condensed">
            <thead>
            <tr>
                <th>Task</th>
                <th>Action</th>                                        
            </tr>
        </thead>   
        <tbody>
        	@foreach ($tasks as $task)
	          <tr>
	              <td><a href="/admin/task/edit/{{ $task->id }}">{{ $task->name }}</a></td>
	              <td>
	              	<a href="task/edit/{{ $task->id }}">Edit</a>
	              	<a href="#" onclick="confirm_delete({{ $task->id }})">Delete</a>
	              </td>
	          </tr>
          @endforeach
        </tbody>
      </table>
      <script type="text/javascript">
      	function confirm_delete(id) {
      		var c = confirm('are you sure want to delete this task?');

      		if(c) {
      			window.location = 'task/delete/'+id;
      		}
      	}
      </script>
	    {!! $tasks->render() !!}
	</div>

@stop