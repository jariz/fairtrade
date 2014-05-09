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

    /**
     * Share data with current view
     * @param $key - Name the variable
     * @param $value - Any value
     * @author Dmitri Chebotarev
     */
    public function add($key, $value){
        View::share($key, $value);
    }
} 