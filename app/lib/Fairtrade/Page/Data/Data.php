<?php
/**
 * Created by PhpStorm.
 * User: ssshenkie
 * Date: 5/9/14
 * Time: 4:30 PM
 */

namespace Fairtrade\Page\Data;
use View;

class Data {

    private $hasCustomView = false;
    private $customView;
    private $exists = true;

    public function __construct( $page ){
        $this->page = $page;
        View::share('page', $page);
    }

    /**
     * Share data with current view
     * @param $key - Name the variable
     * @param $value - Any value
     * @author Dmitri Chebotarev
     */
    public function add($key, $value){
        View::share($key, $value);
    }


    /**
     * Change the view at runtime
     * @param $file - View name
     */
    public function setCustomView( $file ){

        if( View::exists($file) ){
            $this->hasCustomView = true;
            $this->customView = $file;
            return true;
        }

        return false;
    }

    public function hasCustomView(){
        return $this->hasCustomView;
    }

    public function getCustomView(){
        return $this->customView;
    }

    public function notFound(){
        $this->exists = false;
    }

    public function exists(){
        return $this->exists;
    }
} 