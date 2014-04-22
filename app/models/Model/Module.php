<?php

namespace Model;

class Module extends Eloquent {

	protected $table = 'modules';
	public $timestamps = false;
	protected $softDelete = false;

}