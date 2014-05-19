<?php
/**
 * Created by PhpStorm.
 * User: ssshenkie
 * Date: 5/19/14
 * Time: 10:50 PM
 */

namespace Fairtrade\Page;


class Concepts extends Page{
    public $title = 'Activiteiten';
    public $slug = 'activiteiten';
    public $published = 1;
    public $view = 'front.special.concepts';
    public $heading = 'Activiteiten';
    public $menu_title = 'Activiteiten';
    public $order = 4;
    public $parent = 0;
    public $show_in_nav = 1;
    public $data_source = "Concepts";

    protected $meta = [
        'dynamic' => [
            'value' => 'Dit is een dynamische value',
            'type' => 'wysiwyg',
            'label' => 'Dynamische blok'
        ]
    ];
} 