@extends('layouts.default')

@section('content')
  <h1>Task List</h1>
  <!-- Generate Pagination Navigations -->
  {!! $tasks->render() !!}

  <!-- Step 4 -->
  <a href="{!! url('task/create') !!}" class="btn btn-success pull-right">Add New Task</a>
  <table class="table table-condensed table-hover">
  	<tr>
	  	<td>
	  		Title
	  	</td>
	  	<td>
	  		Description
	  	</td>
	  	<td>
	  		Status
	  	</td>
	  	<td>
	  		Action
	  	</td>
  	</tr>
  	@forelse ($tasks as $task)
    	<tr>
		  	<td>
		  		{{ $task->name }}
		  	</td>
		  	<td>
		  		{{ $task->description }}
		  	</td>
		  	<td>
		  		{{ $task->status }}
		  	</td>
		  	<td>
		  		<a href="{!! url('task/'.$task->id.'/edit') !!}"><i class="glyphicon glyphicon-pencil"></i></a>
		  		
		  		<a href="task/{!! $task->id !!}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Are you sure?"><i class="glyphicon glyphicon-trash"></i></a>
		  	</td>
	  	</tr>
	@empty
		<tr>
			<td colspan="4">
	    		<p class="alert alert-warning">No task found</p>
	    	</td>
	    </tr>
	@endforelse
  </table>
  {!! $tasks->render() !!}
@stop

@section('scripts')
	<script type="text/javascript">
		(function() {
 
		  var laravel = {
		    initialize: function() {
		      this.methodLinks = $('a[data-method]');
		      this.token = $('a[data-token]');
		      this.registerEvents();
		    },
		 
		    registerEvents: function() {
		      this.methodLinks.on('click', this.handleMethod);
		    },
		 
		    handleMethod: function(e) {
		      var link = $(this);
		      var httpMethod = link.data('method').toUpperCase();
		      var form;
		 
		      // If the data-method attribute is not PUT or DELETE,
		      // then we don't know what to do. Just ignore.
		      if ( $.inArray(httpMethod, ['PUT', 'DELETE']) === - 1 ) {
		        return;
		      }
		 
		      // Allow user to optionally provide data-confirm="Are you sure?"
		      if ( link.data('confirm') ) {
		        if ( ! laravel.verifyConfirm(link) ) {
		          return false;
		        }
		      }
		 
		      form = laravel.createForm(link);
		      form.submit();
		 
		      e.preventDefault();
		    },
		 
		    verifyConfirm: function(link) {
		      return confirm(link.data('confirm'));
		    },
		 
		    createForm: function(link) {
		      var form = 
		      $('<form>', {
		        'method': 'POST',
		        'action': link.attr('href')
		      });
		 
		      var token = 
		      $('<input>', {
		        'type': 'hidden',
		        'name': '_token',
		        'value': link.data('token')
		        });
		 
		      var hiddenInput =
		      $('<input>', {
		        'name': '_method',
		        'type': 'hidden',
		        'value': link.data('method')
		      });
		 
		      return form.append(token, hiddenInput)
		                 .appendTo('body');
		    }
		  };
		 
		  laravel.initialize();
		 
		})();
	</script>
@stop