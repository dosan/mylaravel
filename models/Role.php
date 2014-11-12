<?php

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	/**
	* Ardent validation rules
	*
	* @var array
	*/
	public static $rules = array(
		'name' => 'required|between:4,255'
	);
}