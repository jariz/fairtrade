<?php

namespace Model;

class Permission extends \Eloquent {

	protected $table = 'permissions';
	public $timestamps = false;
	protected $softDelete = false;

}