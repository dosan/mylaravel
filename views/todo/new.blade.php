@extends('todo.layouts.default')
	@foreach ($errors->all() as $error)
		<div class='errors'>{{$error}}</div>
	@endforeach

@section('content')

	{{Form::open()}}
	<input type='text' name='name' placeholder='task name'>
	<button type='submit'>Create</button>
	{{Form::close()}}
@stop