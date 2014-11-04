@extends('layouts.default')
@section('content')
<article>
	<h1>{{$post->title}}</h1>
	<p>Pub on {{$post->created_at->format('d.m.Y H:i:s')}}</p>
	<p>{{$post->body}}</p>
</article>