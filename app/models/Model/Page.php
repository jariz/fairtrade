<?php

namespace Model;

class Page extends FormattedTimestamps {

	protected $table = 'pages';
	public $timestamps = true;
    protected $softDelete = true;


	public function scopeWhereSlug($query, $slug){
		return $query->where('slug', '=', $slug)->first();
	}
}