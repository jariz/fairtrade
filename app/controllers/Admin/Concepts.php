<?php

namespace Admin;

/**
 * Class Concepts
 * @package Admin
 * @author Jari Zwarts
 */
class Concepts extends CrudController {
    protected function getFields() {
        return array(
            "Titel" => array(
                "name" => "title",
                "type" => "text",
                "rules" => "required"
            )
        );
    }

    protected $model = "\\Model\\Concept";
    protected $singular = "Concept";
    protected $plural = "Concepten";
    protected $route = "dashboard.concepts";
}