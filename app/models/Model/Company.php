<?php

namespace Model;

class Company extends \Eloquent {

	protected $table = 'companies';
	public $timestamps = true;
    protected $softDelete = true;

    public static function boot() {
        parent::boot();

        Company::saving(function($company) {
            if(is_null($company->accepted))
                $company->accepted = 0;
        });
        Company::creating(function($company) {
            if(\Auth::check())
                $company->user_id = \Auth::user()->id;
        });
    }

}