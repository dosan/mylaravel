<?php

class UsersController extends \BaseController {


	public function __construct()
	{
	}
	/**
	 * View user login
	 */

	public function login(){
		return View::make('users.login');
	}

	public function profile(){
		if(Auth::check() == false){	
			return Redirect::route('login-form');
		}
		$user = Auth::user();
		return View::make('users.profile', array('user' => $user));
	}

	public function logout(){
		if(Auth::check()){
		  Auth::logout();
		}
		return Redirect::route('login-form');

	}
	/**
	 * [handleLogin description]
	 * @return redirect login
	 */
	public function handleLogin(){
		$name = Input::get('username');
		$pass = Input::get('password');

		if(Auth::attempt(['username' => $name, 'password' => $pass])) {
			return Redirect::to('/profile');
		}
		else {
			return Redirect::route('login-form')->withInput()->withErrors('That username/password combo does not exist.');;
		}
	}
	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();
		return View::make('users', array('users' => $users));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		$data = array(
			'username'                  => Input::get('username'),
			'email'                 => Input::get('email'),
			'phone'                 => Input::get('phone'),
			'adress'                => Input::get('adress'),
			'password'              => Input::get('password'),
			'password_confirmation' => Input::get('password_confirmation')
		);
		$rules = array(
			'username'                         => 'required',
			'email'                        => 'required',
			'password'                     => 'required',
			'password_confirmation'        => 'required'
		);
		$validator = Validator::make($data, $rules);
		// process the registration
		if ($validator->fails()) {
			Session::flash('message', 'This email is already registered, please choose another one.');
			return Redirect::to('register') ->withErrors($validator)->withInput(Input::except('password'));
		} else {
			$user = new User;
			$user->username       = Input::get('username');
			$user->email        = Input::get('email');
			$user->adress        = Input::get('adress');
			$user->phone        = Input::get('phone');
			$user->password        = Hash::make(Input::get('password'));
			$user->save();
			// redirect
			Session::flash('message', 'Successfully created account! Please login to submit your ad.');
			return Redirect::to('profile');
		}
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /users/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
		$user = User::find(Auth::user()->id);
		return View::make('users.edit', [ 'user' => $user ]);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::find($id);

		$data = array(
			'username'              => Input::get('username'),
			'email'                 => Input::get('email'),
			'phone'                 => Input::get('phone'),
			'adress'                => Input::get('adress'),
			'password'              => Input::get('password'),
			'password_confirmation' => Input::get('password_confirmation'),
			'oldpassword'           => Input::get('oldpassword'),
		);
		$rules = array(
			'username'                      => 'required',
			'email'                         => 'required',
			'password'                      => 'min:6|confirmed',
			'password_confirmation'         => 'min:6',
			'oldpassword'                   => 'required',
		);
		//Auth::attempt(['username' => $data['username'], 'password' => $data['oldpassword']]);
		if ( Hash::check($data['oldpassword'], Auth::user()->password)){
			$validator = Validator::make($data, $rules);
			if ($validator->fails()) {
				Session::flash('message', 'something wrong with validate');
				return Redirect::to('/profile/edit') ->withErrors($validator)->withInput(Input::except('password'));
			} else {
				$user->username   = Input::get('username');
				$user->email      = Input::get('email');
				$user->adress     = Input::get('adress');
				$user->phone      = Input::get('phone');
				$user->password   = Hash::make(Input::get('password'));
				$user->save();
				return Redirect::to('/profile');
			}
		} else {
			Session::flash('message', 'Old password wrong! try again.');
			return Redirect::to('/profile');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);
		return Redirect::to('/');
	}
	public function addUser(){
		return View::make('users.create');
	}
}