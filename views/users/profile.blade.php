@extends('layouts.default')

	@foreach ($errors->all() as $error)
		<div class='errors'>{{$error}}</div>
	@endforeach
@section('body')
<div class="container">
	<div>
		@if(Auth::check())
			<p>Welcome to your profile page {{Auth::user()->id}}-{{Auth::user()->name}} - {{Auth::user()->email}}</p>
		@endif
	</div>
</div>
@stop