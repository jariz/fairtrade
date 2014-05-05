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

    static $permissionCache = [];

    /**
     * Returns whether the current user has the specified permission.
     * @param $alias string The permission you want to check
     * @return bool
     */
    public static function can($alias) {
        if(isset(self::$permissionCache[$alias])) {
            $result = self::$permissionCache[$alias];
            \Debugbar::addMessage("[PERMISSIONS] Checking if current user can {$alias} ... >>> ".($result ? "Yes" : "Nope")." (cached)");
            return $result;
        }
        //sanity check
        if(!\Auth::check()) {
            \Debugbar::addMessage("[PERMISSIONS] Checking if current user can {$alias} ... >>> Nope. (not logged in?!)");
            return false;
        }

        //get user's role id
        $role_id = \Auth::user()->role_id;

        //get permission id
        $permission = Permission::where("alias", "=", $alias)->first();

        if(!$permission) {
            \Debugbar::addMessage("[PERMISSIONS] Checking if current user can {$alias} ... >>> Nope. (alias not found)");
            return false;
        }

        //now that we have all id's, look for the required permission
        $rolepermission = RolePermission::where("permission_id", "=", $permission->id)->where("role_id", "=", $role_id)->first();

        //return whether the role_permission was found (which means we have the permission yes/no)
        \Debugbar::addMessage("[PERMISSIONS] Checking if current user can {$alias} ... >>> ".($rolepermission != false ? "Yes." : "Nope (role_permission not found)"));
        self::$permissionCache[$alias] = $rolepermission != false;
        return $rolepermission != false;
    }

}