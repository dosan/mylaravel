<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
/*		Schema::create('orders', function($t){
			$t->increments('id');
			$t->integer('user_id');
			$t->timestamp('date_payment');
			$t->boolean('status');
			$t->text('comment');
			$t->string('user_ip');
			$t->timestamps();
		});*/
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
