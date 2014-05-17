<?php

namespace Model;

class Category extends \Eloquent {

	protected $table = 'categories';
	public $timestamps = false;
	protected $softDelete = false;

    public function companies()
    {
        return $this->belongsToMany('Company', 'companies_categories');
    }
}