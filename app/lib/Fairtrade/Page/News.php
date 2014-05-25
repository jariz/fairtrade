<?php

namespace Fairtrade\Page;

class News extends Page{

    public $title = 'Nieuws';
    public $slug = 'nieuws';
    public $published = 1;
    public $view = 'front.special.news';
    public $heading = 'Nieuws';
    public $menu_title = 'Nieuws';
    public $order = 1;
    public $parent = 0;
    public $show_in_nav = 1;
    public $data_source = 'News';

    protected $meta = [
        'sidebar_heading' => [
            'value' => 'Horeca grootste uitdaging',
            'type' => 'text',
            'label' => 'Zijbalk titel'
        ],

        'sidebar_description' => [
            'value' => 'Lorem ipsum dolor sit amet, consectetur a. Duis tristique iaculis rhoncus.ec tincidunt fermentum. Vestibulum ante ...',
            'type' => 'wysiwyg',
            'label' => 'Zijbalk tekst'
        ],



    ];


}