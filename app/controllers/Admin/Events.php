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
            "Afbeelding" => array(
                "name" => "image",
                "type" => "file",
                "hideInOverview" => true,
                "rules" => "",
                "uploader" => "Event",
                "required" => false,
                "thumbnail" => [
                    'width' => 150,
                    'height' => 150
                ]
            ),
            "Datum" => array(
                "name" => "date",
                "type" => "date",
                "rules" => "required"
            )
        );
    }

    protected $model = "\\Model\\Event";
    protected $singular = "Evenement";
    protected $plural = "Evenementen";
    protected $route = "dashboard.events";
}