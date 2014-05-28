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
            "Intro" => [
                'name' => 'intro',
                'type' => 'textarea',
                'rules' => 'required|max:300',
                "hideInOverview" => true
            ],
            "Locatie" => array(
                "name" => "location",
                "type" => "text",
                "rules" => "required"
            ),
            "Inhoud" => array(
                "name" => "description",
                "type" => "wysiwyg",
                "rules" => "",
                "hideInOverview" => true
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
    protected $orderBy = ['created_at', 'DESC'];
}