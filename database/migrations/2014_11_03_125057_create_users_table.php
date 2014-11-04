<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
/*		Schema::create('users', function($t){
			$t->increments('id');
			$t->string('name');
			$t->text('password');
			$t->string('email');
			$t->string('adress');
			$t->string('phone');
			$t->timestamps();
		});*/
	Schema::table('users', function(Blueprint $table){
		$table->rememberToken();
	});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
