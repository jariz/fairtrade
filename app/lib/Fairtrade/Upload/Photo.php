<?php
namespace Fairtrade\Upload;

class Photo extends Upload{

    protected $path = 'uploads/companies';

    public function __construct( $input = NULL ){
        parent::__construct( $input );
    }

}