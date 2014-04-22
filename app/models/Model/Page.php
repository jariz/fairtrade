<?php

namespace Model;

class Page extends Eloquent {

	protected $table = 'pages';
	public $timestamps = true;
	protected $softDelete = false;

}