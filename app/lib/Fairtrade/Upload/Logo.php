<?php
namespace Fairtrade\Upload; 

class Logo extends Upload{

	protected $path = 'uploads/logos';

	public function __construct( $input = NULL ){
		parent::__construct( $input );
	}

}