<?php
/**
 * Created by PhpStorm.
 * User: ssshenkie
 * Date: 5/1/14
 * Time: 1:21 PM
 */

namespace Fairtrade;

use Model\Permission;
use Model\RolePermission;

class User {

    public static function isAdmin(){
        if( \Auth::guest() )
            return false;

        if( \Auth::user()->role_id == 1)
           return true;

        return false;
    }

    /**
     * Returns whether the current user has the specified permission.
     * @param $alias string The permission you want to do
     * @return bool
     */
    public static function can($alias) {
        //sanity check
        if(!\Auth::check()) return false;

        //get user's role id
        $role_id = \Auth::user()->role_id;

        //get permission id
        $permission = Permission::where("alias", "=", $alias)->first();

        //yet another sanity check
        if(!$permission) return false;

        //now that we have all id's, look for the required permission
        $rolepermission = RolePermission::where("permission_id", "=", $permission->id)->where("role_id", "=", $role_id)->first();

        //return whether the role_permission was found (which means we have the permission yes/no)
        return $rolepermission != false;
    }

} 