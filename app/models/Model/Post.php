<?php

namespace Model;
use Fairtrade;
class Post extends \Eloquent {

	protected $table = 'news';
	public $timestamps = true;
	protected $softDelete = false;
	protected $appends = [
		'created_formatted', 
		'updated_formatted'
	];

	public function getCreatedFormattedAttribute(){
		return Fairtrade\Date::input( $this->attributes['created_at'] )
			->forHuman();
	}

	public function getUpdatedFormattedAttribute(){
		return Fairtrade\Date::input( $this->attributes['updated_at'] )
			->forHuman();
	}
}