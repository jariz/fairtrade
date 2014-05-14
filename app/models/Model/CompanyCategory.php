<?php

namespace Model;

class CompanyCategory extends \Eloquent {

	protected $table = 'companies_categories';
	public $timestamps = false;
	protected $softDelete = false;


    public static function categories()
    {
        return $this->belongsToMany('Category', 'companies_categories');
    }
}