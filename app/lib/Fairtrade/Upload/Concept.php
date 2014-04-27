<?php
namespace Fairtrade\Upload; 

class Concept extends Upload{

	protected $path = 'uploads/concepts';

	public function __construct( $input = NULL ){
		parent::__construct( $input );
	}

}