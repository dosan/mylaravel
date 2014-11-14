@extends('layouts.default')
@section('title') Create User @stop
	@if ($errors->has())
		@foreach ($errors->all() as $error)
			<div class='bg-danger alert'>{{ $error }}</div>
		@endforeach
	@endif
@section('body')
<div class='col-lg-4 col-lg-offset-4'>
	<h1><i class='fa fa-user'></i> Edit User</h1>
	{{ Form::model($user, ['role' => 'form', 'url' => '/admin/users/' . $user->id . '/edit', 'method' => 'Post']) }}
	<div class='form-group'>
		{{ Form::label('username', 'Your Name') }}
		{{ Form::text('username', null, ['placeholder' => 'Your Name', 'class' => 'form-control']) }}
	</div>
	<div class='form-group'>
		{{ Form::label('email', 'Email') }}
		{{ Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) }}
	</div>
	<div class='form-group'>
		{{ Form::label('adress', 'Adress') }}
		{{ Form::text('adress', null, ['placeholder' => 'Adress', 'class' => 'form-control']) }}
	</div>
	<div class='form-group'>
		{{ Form::label('phone', 'Phone') }}
		{{ Form::text('phone', null, ['placeholder' => 'Phone', 'class' => 'form-control']) }}
	</div>
	<div class='form-group'>
		{{ Form::label('password', 'New Password') }}
		{{ Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']) }}
	</div>
	<div class='form-group'>
		{{ Form::label('password_confirmation', 'Confirm Password') }}
		{{ Form::password('password_confirmation', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) }}
	</div>
	<div class='form-group'>
		{{ Form::label('oldpassword', 'Old Password') }}
		{{ Form::password('oldpassword', ['placeholder' => 'Password', 'class' => 'form-control']) }}
	</div>
	<div class='form-group'>
		{{ Form::submit('Login', ['class' => 'btn btn-primary']) }}
	</div>
	{{ Form::close() }}
</div>
@stop