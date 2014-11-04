@extends('layouts.default')

	@foreach ($errors->all() as $error)
		<div class='errors'>{{$error}}</div>
	@endforeach
@section('body')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
	{{Form::open(array('route' => 'handle-login'))}}
	<input type='text' name='name' class='form-control' placeholder='name'>
	<input type='text' name='password' class='form-control' placeholder='password'>
	{{Form::submit('Login', array('class' => 'btn btn-primary'))}}
	{{ Form::close() }}
    </div>
</div>
@stop
