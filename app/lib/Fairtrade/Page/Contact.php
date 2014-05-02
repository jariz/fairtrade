<?php

namespace Fairtrade\Page;

class Contact extends Page{

    public $title = 'Contact';
    public $slug = 'contact';
    public $published = 1;
    public $view = 'front.special.contact';
    public $heading = 'Contact';
    public $menu_title = 'contact';
    public $order = 3;
    public $parent = 0;
    public $show_in_nav = 1;

    protected $meta = [
        'dynamic' => [
            'value' => 'Dit is een dynamische value',
            'type' => 'wysiwyg',
            'label' => 'Dynamische blok'
        ]
    ];
}