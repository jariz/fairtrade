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
                "hide_if" => ['special' => 1],
                "rules" => "",
                "hideInOverview" => true
            ],

            "Publiceren" => [
                "name" => "published",
                "type" => "checkbox",
                "rules" => ""
            ],

            "Aanpasbare gedeelte" => [
                "name" => "meta",
                "type" => "json",
                "rules" => "",
                "hideInOverview" => true,
                "hide_if" => ['special' => 0]
            ]

        );
    }

    protected $model = "\\Model\\Page";
    protected $singular = "Pagina";
    protected $plural = "Pagina's";
    protected $route = "dashboard.pages";
    protected $timestamps = true;
} 