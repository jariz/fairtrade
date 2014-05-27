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
    public $order = 5;
    public $parent = 0;
    public $show_in_nav = 1;
    public $data_source = "Concepts";

    protected $meta = [
        'heading' => [
            'value' => 'Goed idee? Wacht niet langer en deel hem! deel hem',
            'type' => 'text',
            'label' => 'Titel'
        ],

        'description' => [
            'value' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, cumque, at aliquam odio perferendis quidem error ducimus doloribus eius placeat quis ut aliquid quo nihil alias ullam ipsam numquam. Quas! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, cumque, at aliquam odio perferendis quidem error ducimus doloribus eius placeat quis ut aliquid quo nihil alias ullam ipsam numquam. Quas! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, cumque, at aliquam odio perferendis quidem error ducimus doloribus eius placeat quis ut aliquid quo nihil alias ullam ipsam numquam. Quas!',
            'type' => 'wysiwyg',
            'label' => 'Uitleg tekst',
        ]
    ];
} 