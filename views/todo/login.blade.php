@extends('todo.layouts.default')
	@foreach ($errors->all() as $error)
		<div class='errors'>{{$error}}</div>
	@endforeach

@section('content')

	{{Form::open(array('route' => 'user-login'))}}
	<input type='text' name='name' placeholder='name'>
	<input type='text' name='password' placeholder='password'>
	<button type='submit'>Submit</button>
	{{Form::close()}}
@stop