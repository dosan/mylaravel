@extends('layouts.default')
@section('body')

@if($posts->count())
	@foreach($posts as $post)
		<article>
			<h2>{{$post->title}}</h2>
			<p>{{ Str::limit($post->body, 50) }}</p>
			<a href="{{URL::action('post-index', $post->slug)}}">Read more</a>
		</article>
	@endforeach
@endif
@stop