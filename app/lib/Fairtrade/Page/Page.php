<?php
/**
 * Created by PhpStorm.
 * User: ssshenkie
 * Date: 5/1/14
 * Time: 8:25 PM
 */

namespace Fairtrade\Page;


class Page {

    protected $meta = NULL;

    /**
     * Creates JSON string from meta data array
     * @author Dmitri Chebotarev
     * @return string
     */
    public function meta(){
        if( !is_null( $this->meta ) ){
               return json_encode( $this->meta );
        }
    }
} 