<?php

namespace Model;

class Role extends \Eloquent {

	protected $table = 'roles';
	public $timestamps = false;
	protected $softDelete = false;

}