<?php

namespace Fairtrade\Page;

class Home extends Page{

    public $title = 'Homepage';
    public $slug = 'home';
    public $published = 1;
    public $view = 'front.special.homepage';
    public $heading = 'Homepage';
    public $menu_title = 'home';
    public $order = 0;
    public $parent = 0;

    protected $meta = [
        'dynamic' => [
            'value' => 'Dit is een dynamische value',
            'type' => 'wysiwyg'
        ]
    ];
}