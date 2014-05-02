<?php
namespace Admin;
use URL;
use Model\Page;

class Pages extends CrudController {

    protected function getFields() {


        $data = Page::select(['id', 'title'])
            ->get()
            ->toArray();

        array_unshift($data, ['id' => 0, "title" => 'geen']);




        return array(
            "Pagina titel" => [
                "name" => "title",
                "type" => "text",
                "rules" => "required"
            ],

            "Titel in menu" => [
                "name" => 'menu_title',
                "type" => "text",
                "rules" => "required_if:show_in_nav,1"
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


            "Gepubliceerd" => [
                "name" => "published",
                "type" => "checkbox",
                "rules" => "",
                "boolean" => true
            ],

            "Tonen in Menu" => [
                "name" => "show_in_nav",
                "type" => "checkbox",
                "rules" => "",
                "hideInOverview" => true
            ],

            "Tonen onder" => [
                "name" => "parent",
                "type" => "select",
                "hideInOverview" => true,
                "options" => $data
            ],

            "Aanpasbare gedeelte" => [
                "name" => "meta",
                "type" => "json",
                "rules" => "",
                "hideInOverview" => true,
                "hide_if" => ['special' => 0]
            ],



        );
    }

    protected $model = "\\Model\\Page";
    protected $singular = "Pagina";
    protected $plural = "Pagina's";
    protected $route = "dashboard.pages";
    protected $timestamps = true;
} 