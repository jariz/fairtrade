<?php
/**
 * Created by PhpStorm.
 * User: ssshenkie
 * Date: 5/26/14
 * Time: 8:53 PM
 */

namespace Fairtrade\Page;


class OverFairtrade extends Page{
    public $title = 'Over Fairtrade';
    public $slug = 'over-fairtrade';
    public $published = 1;
    public $view = 'front.special.over-fairtrade';
    public $heading = 'Over Fairtrade';
    public $menu_title = 'Over Fairtrade';
    public $order = 1;
    public $parent = 0;
    public $show_in_nav = 1;

    protected $meta = [
        'heading_main' => [
            'value' => 'Over Fairtrade',
            'type' => 'text',
            'label' => 'Pagina heading'
        ],

        'heading_1' => [
            'value' => 'Hoe het begon',
            'type' => 'text',
            'label' => 'Pagina kop 1'
        ]


        ,'paragraph_1' => [
            'value' => '<p>
       Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed ipsum nulla, tincidunt nec mi eget, posuere semper enim. Nunc tellus elit, ullamcorper nec vehicula sit amet, elementum quis erat. Pellentesque vel turpis nec ipsum mattis sollicitudin nec et urna. Sed id pellentesque mi. Aliquam mi enim, venenatis vitae faucibus ut, tincidunt vitae lorem. Curabitur tincidunt congue lacus, ac mollis risus pretium eu. In porttitor venenatis risus, eget pharetra sapien sagittis at. Cras et nibh sollicitudin, venenatis dui mollis, sagittis massa. Curabitur vitae magna vel metus aliquet lacinia eu eu ante. Etiam mi dolor, auctor vitae dapibus id, fringilla ac nulla. Ut blandit leo nec iaculis dignissim. Praesent tempus varius est. Duis porttitor, justo vel auctor tempor, quam enim ultricies quam, id aliquam dui orci vitae mauris. Curabitur tempus molestie blandit.
   </p>
   <p>
       Aliquam lacinia consequat ligula et luctus. Pellentesque vel sagittis risus. Nullam euismod leo a ante feugiat, at pellentesque eros luctus. In hac habitasse platea dictumst. Sed pellentesque sollicitudin pulvinar. In fringilla metus et enim tempus lobortis. Maecenas egestas auctor lectus, eget dignissim magna hendrerit vel. Aliquam tincidunt erat elit, et sollicitudin eros commodo vitae. Ut quis sodales nisi. Quisque urna sapien, mollis ut tempus sed, sodales a urna.
   </p>',
            'type' => 'wysiwyg',
            'label' => 'Pagina tekst 1'
        ]

        ,'heading_2' => [
            'value' => 'Over het team',
            'type' => 'text',
            'label' => 'Pagina kop 2'
        ]

        ,'paragraph_2' => [
            'value' => '<p>
       Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Phasellus quis ultricies dui. Nam convallis hendrerit lectus eu fringilla. Proin et libero vitae quam tempor consectetur. Maecenas ultrices suscipit justo, mollis convallis mi vestibulum ac. Nullam hendrerit nulla vitae velit sollicitudin pulvinar nec eget urna. Duis magna metus, tempor sit amet mattis quis, feugiat sit amet felis. Etiam ut justo imperdiet, commodo sapien vel, venenatis arcu. Vivamus at egestas nunc. Nam in orci sed risus hendrerit pharetra eu eget risus.
   </p>
   <p>
       Mauris et purus id eros rutrum venenatis. Fusce euismod volutpat lacus sit amet consectetur. Aenean ut vulputate lacus, at mattis sapien. Sed vitae velit a metus malesuada iaculis vel vulputate orci. Aenean semper nisi sed fermentum semper. Duis elementum urna et ante vulputate, in varius magna tincidunt. Quisque ut nulla viverra, tempus lacus quis, sodales lectus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In hac habitasse platea dictumst. Quisque posuere turpis erat, sit amet iaculis dolor mollis ac. In eget nunc sit amet ligula dignissim accumsan eget id sem. Mauris id mattis est.
   </p>
   <p>
       Sed euismod hendrerit ornare. Aenean malesuada orci sed orci lacinia ornare. Ut augue est, molestie sed metus ac, ultricies euismod sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec adipiscing feugiat bibendum. Pellentesque tempor elit libero, at porttitor dui fermentum ut. Integer vel elementum leo, nec consequat erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
   </p>',
            'type' => 'wysiwyg',
            'label' => 'Pagina tekst 2'
        ]



    ];
} 