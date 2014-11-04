<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
/*		Schema::create('posts', function($t){
			$t->increments('id');
			$t->integer('user_id');
			$t->string('title', 100);
			$t->string('slug', 100);
			$t->text('body');
			$t->text('image');
			$t->boolean('enabled');
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
		Schema::drop('posts');
	}

}
