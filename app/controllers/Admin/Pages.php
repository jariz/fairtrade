<?php
namespace Admin;
use URL;

class Pages extends CrudController {

    protected function getFields() {
        return array(
            "Pagina titel" => [
                "name" => "title",
                "type" => "text",
                "rules" => "required"
            ],

            "URL" => [
               "name" => "slug",
               "type" => "text-with-prepend",
                "prepend" => URL::to('/').'/',
                "rules" => "required|alpha_dash"
            ],

            "Inhoud" => [
                "name" => "content",
                "type" => "wysiwyg",
                "rules" => "",
                "hideInOverview" => true
            ],

            "Publiceren" => [
                "name" => "published",
                "type" => "checkbox",
                "rules" => ""
            ]

        );
    }

    protected $model = "\\Model\\Page";
    protected $singular = "Pagina";
    protected $plural = "Pagina's";
    protected $route = "dashboard.pages";
    protected $timestamps = true;
} 