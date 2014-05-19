<?php

namespace Fairtrade\Page;

class Home extends Page{

    public $title = 'Homepage';
    public $slug = 'home';
    public $published = 1;
    public $view = 'front.special.homepage';
    public $heading = 'Homepage';
    public $menu_title = 'Hoofdpagina';
    public $order = 0;
    public $parent = 0;
    public $show_in_nav = 1;
    public $data_source = "Home";

    protected $meta = [
        'youtube' => [
            'value' => 'http://www.youtube.com/embed/OsRFTWLiP9g?list=PL2zniuqMzqkaURTd0uhm9iZqtBDkY7n5Y',
            'type' => 'text',
            'label' => 'Youtube embed URL'
        ],

    ];
}