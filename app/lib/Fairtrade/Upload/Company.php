<?php
namespace Fairtrade\Upload;

class Company extends Upload{

    protected $path = 'uploads/companies';

    public function __construct( $input = NULL ){
        parent::__construct( $input );
    }

}