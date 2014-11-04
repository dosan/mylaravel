<?php

class AuthController extends Controller{

	public function getLogin(){
		return View::make('todo.login');
	}

	public function postLogin(){
		$rules = array('name' =>'required', 'password' => 'required');
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails()){
			return Redirect::route('user-login')->withErrors($validator);
		}
		$auth = Auth::attempt(array(
			'email' => Input::get('name'),
			'password' => Input::get('password')
		), false);
		if (! $auth) {
			return Redirect::route('user-login')->withErrors(array(
				'Authentication error'
			));
		}
		return Redirect::route('todo');
	}	
}