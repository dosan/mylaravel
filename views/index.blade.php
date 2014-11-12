@extends('layouts.default')
@section('body')

@if($posts->count())
	@if($user->hasRole("Admin"))
	@foreach($posts as $post)
		<article>
			<h2>{{$post->title}}</h2>
			<p>{{ Str::limit($post->body, 50) }}</p>
			<a href="{{URL::action('get-post', $post->slug)}}">Read more</a>
		</article>
	@endforeach
	@endif
@endif
@stop