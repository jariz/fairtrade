<?php

namespace Model;
use Fairtrade;

class Post extends FormattedTimestamps {

	protected $table = 'news';
	public $timestamps = true;
    protected $softDelete = true;
    protected $appends = ['intro', 'link'];

    public function getIntroAttribute(){
        $intro  = substr($this->attributes['content'], 0, 300);
        return strip_tags($intro);
    }

    public function getLinkAttribute(){
        return URL::route('news-item', [$this->attributes['id'], $this->attributes['title']]);
    }

}