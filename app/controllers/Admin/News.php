<?php

namespace Admin;

class News extends CrudController {
    protected function getFields() {
        return array(
            "Titel" => array(
                "name" => "title",
                "type" => "text",
                "rules" => "required"
            ),
            "Inhoud" => array(
                "name" => "content",
                "type" => "wysiwyg",
                "rules" => "",
                "hideInOverview" => true
            ),
            "Afbeelding" => array(
                "hideInOverview" => true,
                "name" => "image",
                "type" => "file",
                "rules" => "image"
            )
        );
    }

    protected $model = "\\Model\\Post";
    protected $singular = "Nieuws artikel";
    protected $plural = "Nieuws artikelen";
    protected $route = "dashboard.news";
}