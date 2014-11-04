<?php

class UsersTableSeeder extends Seeder{
	public function run(){
		DB::table('users')->delete();
		$users = array(
			array(
				'name' => 'mrknown@ya.ru',
				'password' => Hash::make('password'),
				'email' => 'mrknown@mail.ru'
			)
		);
		DB::table('users')->insert($users);
	}
}