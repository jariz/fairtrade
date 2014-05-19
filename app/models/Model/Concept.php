<?php

namespace Model;
use URL, Str;
class Concept extends \Eloquent {

	protected $table = 'concepts';
	public $timestamps = true;
    protected $softDelete = true;
    protected $appends = ['link'];

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

    public function company() {
        return $this->belongsTo('Model\Company', 'company_id', 'id');
    }

    public function getLinkAttribute(){
        return URL::route('concept-item', [$this->id, Str::slug($this->title)]);
    }
}