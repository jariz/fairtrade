<?php
/**
 * JARIZ.PRO
 * Date: 24/04/2014
 * Time: 10:22
 * Author: JariZ
 */

namespace Admin;

/**
 * Class Users
 * @package Admin
 * @author Jari Zwarts
 */
class Users extends CrudController {
    protected function getFields() {

        $roles = [];
        $in = "";
        foreach(\Model\Role::all() as $role) {
            /* @var $role \Model\Role */
            $roles[] = [
                "id" => $role->id,
                "title" => $role->name
            ];
            $in .= ",".$role->id;
        }

        return array(
            "E-mail" => array(
                "name" => "email",
                "type" => "text",
                "rules" => "required|email"
            ),
            "Wachtwoord" => array(
                "name" => "password",
                "type" => "password",
                "rules" => "",
                "hideInOverview" => true
            ),
            "Naam" => array(
                "name" => "name",
                "type" => "text",
                "rules" => ""
            ),
            "Rol" => array(
                "name" => "role_id",
                "type" => "select",
                "options" => $roles,
                "rules" => "required|in:".$in
            ),
            "IP adres" => array(
                "name" => "ip",
                "type" => "text",
                "rules" => "ip"
            )
        );
    }

    protected $model = "\\Model\\User";
    protected $singular = "Gebruiker";
    protected $plural = "Gebruikers";
    protected $route = "dashboard.users";
} 