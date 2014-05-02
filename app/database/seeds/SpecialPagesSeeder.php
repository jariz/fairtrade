<?php
/**
 * Created by PhpStorm.
 * User: ssshenkie
 * Date: 5/1/14
 * Time: 8:17 PM
 */

class SpecialPagesSeeder extends Seeder {

    public function run(){
        $namespace = "Fairtrade\\Page\\";

        /* Classes uit de $namespace */
        $pages = [
            'Home',
        ];

        foreach( $pages as $page ){

            $class      = $namespace.$page;
            $object     = new $class;
            $pageModel  = new Model\Page;

            $pageModel->title       = $object->title;
            $pageModel->slug        = $object->slug;
            $pageModel->published   = $object->published;
            $pageModel->view        = $object->view;
            $pageModel->heading     = $object->heading;
            $pageModel->menu_title  = $object->menu_title;
            $pageModel->order       = $object->order;
            $pageModel->parent      = $object->parent;
            $pageModel->special     = 1;
            $pageModel->meta        = $object->meta();
            $pageModel->save();

        }
    }
} 