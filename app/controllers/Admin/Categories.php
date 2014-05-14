<?php
namespace Admin;

/**
 * Class Category
 * @package Admin
 * @author Wies Kueter
 */
class Categories extends CrudController {
    protected function getFields() {
        return array(
            "Naam" => array(
                "name" => "name",
                "type" => "text",
                "rules" => "required"
            ),
            "Kleur" => array(
                "name" => "color",
                "type" => "color",
                "rules" => ""
            )
        );
    }


    protected $model = "\\Model\\Category";
    protected $singular = "Categorie";
    protected $plural = "Categorie&euml;n";
    protected $route = "dashboard.categories";
}