<?php

namespace Model;

class Category extends \Eloquent {

	protected $table = 'categories';
	public $timestamps = false;
	protected $softDelete = false;

    public static function companies()
    {
        return $this->belongsToMany('Company', 'companies_categories', 'category_id', 'company_id');
    }
}