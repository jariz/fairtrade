<?php

namespace Fairtrade\Page;

class Events extends Page{

    public $title = 'Evenementen';
    public $slug = 'evenementen';
    public $published = 1;
    public $view = 'front.special.events';
    public $heading = 'Evenementen';
    public $menu_title = 'Evenementen';
    public $order = 2;
    public $parent = 0;
    public $show_in_nav = 1;
    public $data_source = 'Events';

    protected $meta = [
        'dynamic' => [
            'value' => 'Dit is een dynamische value',
            'type' => 'wysiwyg',
            'label' => 'Dynamische blok'
        ]
    ];
}