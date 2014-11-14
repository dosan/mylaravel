<?php

class AdminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /admin
	 *
	 * @return Response
	 */
	public function index()
	{
		
	}
	/**
	 * users user list in our site
	 * @return view site users
	 */
	public function users()
	{
/*		$owner = new Role;
		$owner->name = 'Owner';
		$owner->save();

		$admin = new Role;
		$admin->name = 'Admin';
		$admin->save();
		$user = User::where('username','=','donald')->first();
		$user->roles()->attach( $admin->id );
		$managePosts = new Permission;
		$managePosts->name = 'manage_posts';
		$managePosts->display_name = 'Manage Posts';
		$managePosts->save();

		$manageUsers = new Permission;
		$manageUsers->name = 'manage_users';
		$manageUsers->display_name = 'Manage Users';
		$manageUsers->save();

		$owner->perms()->sync(array($managePosts->id,$manageUsers->id));
		$admin->perms()->sync(array($managePosts->id));*/
		$donald = User::where('username','=','donald')->first();
		$users = User::all();
		return View::make('admin.users', array('users' => $users, 'donald' => $donald));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /admin/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /admin
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /admin/{id}
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
	public function useredit($id)
	{
		$user = User::find($id);
		return View::make('admin.useredit', [ 'user' => $user ]);
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /admin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function userupdate($id)
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
		$validator = Validator::make($data, $rules);
		if (Hash::check($data['oldpassword'], $user->password)){
			if ($validator->fails()) {
				Session::flash('message', 'something wrong with validate');
				return Redirect::to('/admin/users') ->withErrors($validator)->withInput(Input::except('password'));
			} else {
				$user->username   = Input::get('username');
				$user->email      = Input::get('email');
				$user->adress     = Input::get('adress');
				$user->phone      = Input::get('phone');
				$user->password   = Hash::make(Input::get('password'));
				$user->save();
				return Redirect::to('/admin/users/');
			}
		} else {
			return Redirect::to('/admin/users')->withErrors('old password is wrong! Please try again.');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /admin/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}