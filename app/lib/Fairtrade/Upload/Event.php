<?php
namespace Fairtrade\Upload; 

class Event extends Upload{

	protected $path = 'uploads/events';

	public function __construct( $input = NULL ){
		parent::__construct( $input );
	}

}