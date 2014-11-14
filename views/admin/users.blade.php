@extends('layouts.default')
	@foreach ($errors->all() as $error)
		<div class='bg-danger alert'>{{ $error }}</div>
	@endforeach
@section('body')
<div class="col-lg-10 col-lg-offset-1">
	<h1><i class="fa fa-users"></i> User Administration <a href="/logout" class="btn btn-default pull-right">Logout</a></h1>
	<div class="table-responsive">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Adress</th>
					<th>Phone</th>
					<th>Date/Time Added</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@foreach ($users as $user)
				<tr>
					<td>{{ $user->username}}</td>
					<td>{{ $user->email }}</td>
					<td>{{ $user->adress }}</td>
					<td>{{ $user->phone }}</td>
					<td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
					<td>
						<a href="/admin/users/{{ $user->id }}/edit/" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<a href="/user/create" class="btn btn-success">Add User</a>
</div>
@stop