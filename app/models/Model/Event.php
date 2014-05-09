<?php

namespace Model;

class Event extends \Eloquent {

	protected $table = 'events';
	public $timestamps = true;
    protected $softDelete = true;
    protected $appends = ['intro'];

    public function getIntroAttribute(){
        $intro  = substr($this->attributes['description'], 0, 300);
        return strip_tags($intro);
    }

}