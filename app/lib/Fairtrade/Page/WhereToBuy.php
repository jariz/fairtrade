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
    public $slug = 'waartekoop';
    public $published = 1;
    public $view = 'front.special.wheretobuy';
    public $heading = 'Waar te koop';
    public $menu_title = 'Waar te koop';
    public $order = 100;
    public $parent = 0;
    public $show_in_nav = 1;
    public $data_source = 'WhereToBuy';

    protected $meta = [
        'heading' => [
            'value' => 'Ben jij al Fairtrade?',
            'type' => 'text',
            'label' => 'Titel'
        ],

        'description' => [
            'value' => '<p>Ben jij bewust van Fairtrade bij jou in de buurt? Welke winkels bij jou in de buurt doen aan het verkoop van Fairtrade-producten?</p>
<p>Met behulp van de kaart kan jij op zoek naar de Fairtrade-winkels bij jou om de hoek.</p>
<p>Ga opzoek naar Fairtrade bij jou in de buurt!</p>',
            'type' => 'wysiwyg',
            'label' => 'Uitleg tekst'
        ],

    ];
}