<?php

namespace Model;

class Post extends \Eloquent {

	protected $table = 'news';
	public $timestamps = true;
	protected $softDelete = false;

}