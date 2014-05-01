<?php
/**
 * Created by PhpStorm.
 * User: ssshenkie
 * Date: 5/1/14
 * Time: 1:21 PM
 */

namespace Fairtrade;

class User {

    public static function isAdmin(){
        if( \Auth::guest() )
            return false;

        if( \Auth::user()->role_id == 1)
           return true;

        return false;
    }

} 