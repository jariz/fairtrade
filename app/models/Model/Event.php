<?php

namespace Model;
use URL, Str;

class Event extends FormattedTimestamps {

	protected $table = 'events';
	public $timestamps = true;
    protected $softDelete = true;
    protected $appends = ['intro', 'date_formatted', 'link'];

    public function getIntroAttribute(){
        $intro  = substr($this->attributes['description'], 0, 300);
        return strip_tags($intro);
    }

    public function getDateFormattedAttribute(){
        return \Fairtrade\Date::input( $this->attributes['created_at'] )
            ->forHuman();
    }

    public function getLinkAttribute(){
        return URL::route('event-item', [$this->id, Str::slug($this->title)]);
    }

}