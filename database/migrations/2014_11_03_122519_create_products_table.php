<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
/*		Schema::create('products', function($t){
			$t->increments('id');
			$t->integer('category_id');
			$t->string('title', 100);
			$t->string('slug', 100);
			$t->longtext('description');
			$t->integer('price');
			$t->boolean('status');
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
