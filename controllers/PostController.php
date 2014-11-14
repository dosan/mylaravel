<?php

class PostController extends BaseController{

	public function index(){
		$posts = Post::all();
		return View::make('index', array('posts' => $posts));
	}

	public function getPost($slug){
		$post = Post::where('slug', '=', $slug)->firstOrFail();
		return View::make('posts.show')->with('post', $post);
	}
}