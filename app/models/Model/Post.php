<?php

namespace Model;
use Fairtrade, URL, Str, File;

class Post extends FormattedTimestamps {

	protected $table = 'news';
	public $timestamps = true;
    protected $softDelete = true;
    protected $appends = ['intro', 'link', 'image_url', 'thumbnail_url'];
    private $image_path = 'uploads/news/';

    public function getIntroAttribute(){
        $intro  = substr($this->attributes['content'], 0, 300);
        return strip_tags($intro);
    }

    public function getLinkAttribute(){
        return URL::route('news-item', [$this->attributes['id'], Str::slug($this->attributes['title'])]);
    }

    public function getImageUrlAttribute(){
        return URL::asset( $this->image_path . $this->image );
    }

    public function getThumbnailUrlAttribute(){

        $thumbnail = $this->image_path. 't/'. $this->image;
        if( File::exists( $thumbnail )){
            return $thumbnail;
        }

        return URL::asset( $this->image_path . $this->image );
    }

}