<?php
namespace System;
use \Model\Permission, \Model\Role, \Model\RolePermission;

/**
 * RoleSeeder fills the following table with default settings:
 * roles, role_permissions, permissions
 * @author Jari Zwarts
 */
class RoleSeeder extends \Seeder {
    public function run() {

        Role::truncate();
        RolePermission::truncate();
        Permission::truncate();

        $roles = [
            "Beheerder" => "admin",
            "Ondernemer" => "business",
            "Redacteur" => "editor"
        ];

        foreach($roles as $label => $type) {
            $role = new Role();
            $role->name = $label;

            if($type == "admin")
                $role->id = 1;

            $role->save();

            //build default crud permissions
            $permissions = $this->build($type);

            //add 'special' permissions that aren't part of the normal crud procedure
            switch($type) {
                case "admin":
                    $permissions[] = "dashboard.companies-approve";
                    $permissions[] = "dashboard.concepts-approve";
                    break;
            }

            foreach($permissions as $permission_name) {
                $permission = Permission::firstOrCreate([
                    "alias" => $permission_name
                ]);
                RolePermission::create([
                    "role_id" => $role->id,
                    "permission_id" => $permission->id
                ]);
            }

        }
    }

    function build($type) {
        $permissions = [];
        foreach(\Config::get("fairtrade.crud") as $route => $controller) {
            if($this->can($type, $route))
                $permissions = array_merge($permissions, $this->buildRoute($route));
        }
        return $permissions;
    }

    function can($type, $route) {
        switch($type) {
            case "admin":
                return true; //admin can do everything
            case "business":
                switch($route) {
                    case "companies":
                    case "concepts":
                        return true;
                    default:
                        return false;
                }
                break;
            case "editor":
                switch($route) {
                    case "news":
                    case "events":
                        return true;
                    default:
                        return false;
                }
                break;
            default:
                return false;
        }
    }

    function buildRoute($route) {
        return array(
            "dashboard.{$route}",
            "dashboard.{$route}-add",
            "dashboard.{$route}-edit",
            "dashboard.{$route}-delete",
            "dashboard.{$route}-doedit",
            "dashboard.{$route}-dorestore",
            "dashboard.{$route}-trash"
        );
    }
} 