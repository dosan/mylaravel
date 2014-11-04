<?php

class ItemsTableSeeder extends Seeder{

	public function run(){
		DB::table('items')->delete();
		$items = array(
			array(
				'user_id' => '1',
				'name' => 'Todo Num 1',
				'done' => false
			),
			array(
				'user_id' => '1',
				'name' => 'Todo Num 2',
				'done' => false
			)
		);
		DB::table('items')->insert($items);
	}
}