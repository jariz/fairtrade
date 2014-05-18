<?php
/**
 * Created by PhpStorm.
 * User: wieskueter.com
 * Date: 5/18/14
 * Time: 10:19 PM
 */

namespace Fairtrade\Page;

class WhereToBuy extends Page
{
    public $title = 'Waar te koop';
    public $slug = 'waar-te-koop';
    public $published = 1;
    public $view = 'front.special.wheretobuy';
    public $heading = 'Waar te koop';
    public $menu_title = 'Waar te koop';
    public $order = 100;
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