<?php

namespace Model;

class Concept extends \Eloquent {

	protected $table = 'concepts';
	public $timestamps = true;
	protected $softDelete = false;

    public static function boot() {
        parent::boot();

        Concept::saving(function($concept) {
            if(is_null($concept->accepted))
                $concept->accepted = 0;
            if(is_null($concept->featured))
                $concept->featured = 0;
        });
        Concept::creating(function($concept) {
            if(\Auth::check())
                $concept->user_id = \Auth::user()->id;
        });
    }

    public function getCompanyIdFormattedAttribute() {
        $company = Company::find($this->company_id);
        if(!$company)
            return "Onbekend";
        else return $company->name;
    }
}