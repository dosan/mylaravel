<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home-index', 'uses' => 'PostController@index'));
Route::get('/posts/{slug}', array('as' => 'post-index', 'uses' => 'PostController@getPost'));

Route::resource('/user', 'UsersController');
Route::get('/login', array('as' => 'login-form', 'uses' => 'UsersController@login'));
Route::post('/login', array('as' => 'handle-login', 'uses' => 'UsersController@handleLogin'));
Route::get('/logout', array('as' => 'logout', 'uses' => 'UsersController@logout'));
Route::get('/register', array('as' => 'create', 'uses' => 'UsersController@create'));

Route::get('/profile', array('as' => 'profile-data', 'uses' => 'UsersController@profile'));
Route::get('/profile/edit', array('as' => 'profile-edit', 'uses' => 'UsersController@edit'));
Route::post('/profile/edit/{id}', array('as' => 'profile-edit-id', 'uses' => 'UsersController@update'));

Route::get('/admin', array('as' => 'admin-place', 'uses' => 'AdminController@index'));
Route::get('/admin/users', array('as' => 'user-list', 'uses' => 'AdminController@users'));
Route::get('/admin/users/{id}/edit', array( 'uses' => 'AdminController@useredit'));
Route::post('/admin/users/{id}/edit', array('as' => 'user-edit', 'uses' => 'AdminController@userupdate'));

Route::get('/adduser', array('as' => 'add-user', 'uses' => 'UsersController@addUser'));
Route::get('/address', array('as' => 'address-list', 'uses' => 'AddressController@index'));

Route::filter('Admin', function(){
	if (! Entrust::hasRole('Admin') ){
		return Redirect::to('/');
	}
});



// Only users with roles that have the 'manage_posts' permission will
// be able to access any admin/post route.
Route::when('admin/post*', 'manage_posts');
Route::when('users*', 'Admin');
Route::when('admin*', 'Admin');
