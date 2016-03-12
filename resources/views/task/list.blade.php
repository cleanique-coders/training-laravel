@extends('laravel-authentication-acl::admin.layouts.base-2cols')

@section('content')
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
	    <h3><i class="fa fa-dashboard"></i> Task List <a class="pull-right btn btn-sm btn-success" href="{!! url('admin/task/add') !!}"><i class="glyphicon glyphicon-plus"></i></a></h3>

	</div>
	<div class="col-md-12 col-sm-12 col-xs-12">
		{!! $senarai->render() !!}
		<div class="table-responsive">
			<table class="table">
			    <thead>
			        <tr>
			            <th>Name</th>
			            <th>Description</th>
			            <th>Status</th>
			            <th>Actions</th>
			        </tr>
			    </thead>
			    <tbody>
			    	@forelse ($senarai as $tugasan)
					    <tr>
				            <td>{{ $tugasan->name }}</td>
				            <td>{{ $tugasan->description }}</td>
				            <td>{{ $tugasan->status }}</td>
				            <td>
				            	<a href="{!! url('admin/task/edit/'.$tugasan->id) !!}"><i class="glyphicon glyphicon-pencil"></i></a>
				            	@if($can_delete)
				            	<a href="#" onclick="confirm_delete({{ $tugasan->id }})"><i class="glyphicon glyphicon-trash"></i></a>
				            	@endif
				            </td>
				        </tr>
					@empty
						<tr>
							<td colspan="3">
					    		<p class="alert alert-warning">No task found</p>
					    	</td>
					    </tr>
					@endforelse
			    </tbody>
			</table>
		</div>
		{!! $senarai->render() !!}
	</div>
</div>
@stop

@section('footer_scripts')
	<script type="text/javascript">
		function confirm_delete(id) {
      		var c = confirm('Are you sure want to delete this task?');

      		if(c) {
      			// if confirmed to delete,
      			// redirect to task/delete page, together with task id
      			window.location = '{!! url('admin/task/delete/') !!}/'+id;
      		}
      	}
	</script>
@stop