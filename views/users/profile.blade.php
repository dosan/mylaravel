@extends('layouts.default')
	@foreach ($errors->all() as $error)
		<div class='bg-danger alert'>{{ $error }}</div>
	@endforeach
@section('body')
<div class="container">
	<div>
		@if(Auth::check())
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
						<tr>
							<td>{{ $user->username}}</td>
							<td>{{ $user->email }}</td>
							<td>{{ $user->adress }}</td>
							<td>{{ $user->phone }}</td>
							<td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
							<td>
								<a href="/profile/edit" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>

		@endif
	</div>
</div>
@stop