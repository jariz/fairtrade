<?php

namespace Model;

class RolePermission extends \Eloquent {

	protected $table = 'role_permissions';
	public $timestamps = false;
	protected $softDelete = false;

}