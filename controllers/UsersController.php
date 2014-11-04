<?php

class UsersController extends \BaseController {

	/**
	 * View user login
	 */

	public function login(){
		return View::make('users.login');
	}

	public function profile(){
		return View::make('users.profile');
	}

	public function logout(){
		if(Auth::check()){
		  Auth::logout();
		}
		return Redirect::route('login');

	}
	/**
	 * [handleLogin description]
	 * @return redirect login
	 */
	public function handleLogin(){
		$name = Input::get('name');
		$pass = Input::get('password');

        $credentials = array(
			'name' => $name,
			'password' => $pass
		);

		if(Auth::attempt($credentials, true)) {
			return Redirect::to('/profile');
		}
		else {
			return Redirect::route('login')->withInput();
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
		//
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
			'name'                  => Input::get('name'),
			'email'                 => Input::get('email'),
			'phone'                 => Input::get('phone'),
			'adress'                => Input::get('adress'),
			'password'              => Input::get('password'),
			'password_confirmation' => Input::get('password_confirmation')
		);        
		$rules = array(
			'name'                         => 'required',
			'email'                        => 'required',
			'password'                     => 'required',
			'password_confirmation'        => 'required'
		);
		$validator = Validator::make($data, $rules);
		// process the registration
        if ($validator->fails()) {
			Session::flash('message', 'This email is already registered, please choose another one.');
			return Redirect::to('create') ->withErrors($validator)->withInput(Input::except('password'));
        } else {
			$user = new User;
			$user->name       = Input::get('name');
			$user->email        = Input::get('email');
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
	public function edit($id)
	{
		//
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
		//
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
		//
	}

}