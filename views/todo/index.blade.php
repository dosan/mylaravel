@extends('todo.layouts.default')

@section('content')
<h1>Items</h1>
	<a href="{{URL::route('new-task')}}">new-task</a>
	<ul>
		@foreach ($items as $item)
		<li>
			{{Form::open()}}
				<input type="checkbox" name="item" id="item_{{ $item->id }}" {{$item->done ? 'checked' : ''}} onclick="this.form.submit()">
				<input type="hidden" name="item_id" value="{{$item->id}}">
				<label for="item_{{$item->id}}"> {{$item->name}}</label>
				&nbsp;&nbsp;&nbsp;<span><a href="{{URL::route('delete-task', $item->id)}}">del</a></span>
			{{Form::close()}}
		</li>
		@endforeach
	</ul>
@stop