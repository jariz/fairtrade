<?php

namespace Model;

class Concept extends Eloquent {

	protected $table = 'concepts';
	public $timestamps = true;
	protected $softDelete = false;

}