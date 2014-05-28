<?php

namespace Model;
use URL, Str, DateTime;

class Event extends FormattedTimestamps {

	protected $table = 'events';
	public $timestamps = true;
    protected $softDelete = true;
    protected $appends = ['date_formatted', 'link'];


    public function getDateFormattedAttribute(){
        return \Fairtrade\Date::input( $this->attributes['date'] )
            ->forHuman();
    }

    public function getLinkAttribute(){
        return URL::route('event-item', [$this->id, Str::slug($this->title)]);
    }

    public function scopeActive($query){
        $now =  new DateTime('today');
        return $query->where( 'date', '>=', $now );
    }

}