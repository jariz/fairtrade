<?php

namespace Fairtrade\Page;

class News extends Page{

    public $title = 'Nieuws';
    public $slug = 'nieuws';
    public $published = 1;
    public $view = 'front.special.news';
    public $heading = 'Nieuws';
    public $menu_title = 'nieuws';
    public $order = 1;
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