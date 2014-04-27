<?php
namespace Fairtrade\Upload;

class News extends Upload{

	protected $path = 'uploads/news';

	public function __construct( $input = NULL ){
		parent::__construct( $input );
	}

}