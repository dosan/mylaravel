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

Route::get('/', array(
		'as' => 'index',
		'uses' => 'HomeController@index'
));

Route::get('/posts/{slug}', array(
		'as' => 'get-post',
		'uses' => 'PostController@getPost'
));

Route::resource('user', 'UsersController'); 
Route::get('login', array('as' => 'login', 'uses' => 'UsersController@login'));
Route::get('/profile', array('as' => 'profile', 'uses' => 'UsersController@profile'));
Route::get('/register', array('as' => 'create', 'uses' => 'UsersController@create'));
Route::post('/login', array('as' => 'handle-login', 'uses' => 'UsersController@handleLogin'));
Route::get('/logout', array('as' => 'logout', 'uses' => 'UsersController@logout'));

Route::get('/todo', [
		'as' => 'todo',
		'uses' => 'TodoController@index'
])->before('auth');

Route::get('/todo/login', array(
		'as' => 'user-login',
		'uses' => 'AuthController@getLogin'
))->before('guest');

Route::post('/todo/login', array(
		'uses' => 'AuthController@postLogin'
))->before('csrf');

Route::post('/todo', array(
		'uses' => 'TodoController@postIndex'
))->before('csrf');

Route::get('/todo/new', array(
		'as' => 'new-task',
		'uses' => 'TodoController@getNew'
));

Route::post('/todo/new', array(
		'uses' => 'TodoController@postNew'
))->before('csrf');

Route::bind('item', function($value, $route){
	return Item::where('id', $value)->first();
});
Route::get('/todo/delete/{item}', array(
	'as' => 'delete-task',
	'uses' => 'TodoController@getDelete'
));