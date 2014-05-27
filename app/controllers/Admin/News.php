<?php

namespace Admin;

/**
 * Class News
 * @package Admin
 * @author Jari Zwarts
 */
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
                "uploader" => "News",
                "type" => "file",
                "thumbnail" => [
                  "width" => 150,
                  "height" => 150
                ],
                "rules" => "image"
            ),

            'Gepubliceerd' => [
                'name' => 'published',
                'type' => 'checkbox',
                "boolean" => true
            ]
        );
    }

    protected $model = "\\Model\\Post";
    protected $upload = "\\Fairtrade\\Upload\\News";
    protected $singular = "Nieuws artikel";
    protected $plural = "Nieuws artikelen";
    protected $route = "dashboard.news";
    protected $timestamps = true;
}