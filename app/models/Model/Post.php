<?php

namespace Model;
use Fairtrade;
class Post extends FormattedTimestamps {

	protected $table = 'news';
	public $timestamps = true;
	protected $softDelete = false;
}