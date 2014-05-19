<?php
/**
 * Created by PhpStorm.
 * User: ssshenkie
 * Date: 5/1/14
 * Time: 8:17 PM
 */
namespace System;
class SpecialPagesSeeder extends \Seeder {

    public function run(){

        \Model\Page::truncate();
        $namespace = "Fairtrade\\Page\\";

        /* Classes uit de $namespace */
        $pages = [
            'Home',
            'News',
            'Events',
            'Contact',
            'WhereToBuy',
            'Concepts'
        ];

        foreach( $pages as $page )
        {
            $class      = $namespace.$page;
            $object     = new $class;
            $pageModel  = new \Model\Page;

            $properties = get_object_vars($object);

            if(array_key_exists('meta', $properties)){
                unset($properties['meta']);
            }

            foreach($properties as $key => $value){
                $pageModel->$key = $value;
            }

            $pageModel->meta = $object->meta();
            $pageModel->save();
        }
    }
}