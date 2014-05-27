<?php

namespace Model;
use Fairtrade, URL, Str, File;

class Post extends FormattedTimestamps {

	protected $table = 'news';
	public $timestamps = true;
    protected $softDelete = true;
    protected $appends = ['intro', 'link', 'image_url', 'thumbnail_url'];
    private $image_path = 'uploads/news/';

    public static function boot(){
        static::saving(function($item){
            if(is_null($item->published))
                $item->published = 0;
        });
    }

    public function getIntroAttribute(){
        return \Fairtrade\Util::truncate($this->attributes['content'], 300);
    }

    public function getLinkAttribute(){
        return URL::route('news-item', [$this->attributes['id'], Str::slug($this->attributes['title'])]);
    }

    public function getImageUrlAttribute(){
        if( is_null($this->image) || empty( $this->image) ){
            return URL::asset('images/test/test-news.jpg');
        }

        return URL::asset( $this->image_path . $this->image );
    }

    public function getThumbnailUrlAttribute(){
        if( is_null($this->image) || empty( $this->image) ){
            return URL::asset('images/test/test-news-thumbnail.jpg');
        }

        $thumbnail = $this->image_path. 't/'. $this->image;
        if( File::exists( $thumbnail )){
            return $thumbnail;
        }

        return URL::asset( $this->image_path . $this->image );
    }

}