<?php

namespace Admin;

/**
 * Class Events
 * @package Admin
 * @author Jari Zwarts
 */
class Events extends CrudController {
    protected function getFields() {
        return array(
            "Titel" => array(
                "name" => "title",
                "type" => "text",
                "rules" => "required"
            ),
            "Locatie" => array(
                "name" => "location",
                "type" => "text",
                "rules" => "required"
            ),
            "Datum" => array(
                "name" => "date",
                "type" => "date",
                "rules" => "required|date"
            )
        );
    }

    protected $model = "\\Model\\Event";
    protected $singular = "Evenement";
    protected $plural = "Evenementen";
    protected $route = "dashboard.events";
}