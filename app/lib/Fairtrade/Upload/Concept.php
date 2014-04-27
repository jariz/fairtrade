<?php
namespace Fairtrade\Upload; 

class Concept extends Upload{

	protected $path = 'uploads/cocepts';

	public function __construct( $input = NULL ){
		parent::__construct( $input );
	}

}