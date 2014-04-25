<?php

namespace Model;

class Page extends \Eloquent {

	protected $table = 'pages';
	public $timestamps = true;
	protected $softDelete = false;


	public function scopeWhereSlug($query, $slug){
		return $query->where('slug', '=', $slug)->first();
	}
}