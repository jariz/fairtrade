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
            "Administrator" => array(
                "name" => "admin",
                "type" => "radio",
                "options" => array(
                    "Ja" => 1,
                    "Nee" => 0
                ),
                "boolean" => true,
                "rules" => "required|in:0,1"
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