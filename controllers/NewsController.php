<?php

class NewsController extends Controller{
	public function getPost($news_id){
		$new = New::where('news_id', '=', $news_id)->firstOrFail();
		return View::make('news.show')->with('new', $new);
	}
}