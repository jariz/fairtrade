<?php

namespace Model;

class Page extends FormattedTimestamps {

	protected $table = 'pages';
	public $timestamps = true;
    protected $softDelete = true;

    public static function boot(){
        static::saving( function( $page ){
            if( is_null($page->show_in_nav)){
                $page->show_in_nav = 0;
            }

            if( is_null($page->published)){
                $page->published = 0;
            }
        } );
    }

	public function scopeWhereSlug($query, $slug){
		return $query->where('slug', '=', $slug)->first();
	}
}