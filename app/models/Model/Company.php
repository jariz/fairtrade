<?php

namespace Model;

class Company extends Eloquent {

	protected $table = 'companies';
	public $timestamps = true;
	protected $softDelete = false;

}