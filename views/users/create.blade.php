@extends('layouts.default')
	@foreach ($errors->all() as $error)
		<div class='errors'>{{$error}}</div>
	@endforeach
@section('body')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h2>Register here</h2>
        {{ Form::open(array('route' => array('user.store'), 'method' => 'post')) }}
        <div class="form-group">
            {{Form::label('name','Your Name')}}
            {{Form::text('name', null,array('class' => 'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('email','Your Email')}}
            {{Form::text('email', null,array('class' => 'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('adress','Your adress')}}
            {{Form::text('adress', null,array('class' => 'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('phone','Your phone')}}
            {{Form::text('phone', null,array('class' => 'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('password','Password')}}
            {{Form::password('password',array('class' => 'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('password_confirmation','Confirm Password')}}
            {{Form::password('password_confirmation',array('class' => 'form-control'))}}
        </div>
        {{Form::submit('Register', array('class' => 'btn btn-primary'))}}
        {{ Form::close() }}
    </div>
</div>
@stop
