<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddress extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('address', function($t){
			$t->increments('id');
			$t->integer('user_id');
			$t->string('address');
			$t->string('address2');
			$t->string('district');
			$t->integer('city_id');
			$t->string('postal_code');
			$t->string('phone');
			$t->string('location');
			$t->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
