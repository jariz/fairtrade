<?php
/**
 * Wies Kueter
 * Date: 17/05/2014
 * Time: 14:34
 * Author: Wies Kueter
 */

namespace System;
use \Model\Category;
class CategorySeeder extends \Seeder {
    public function run()
    {
        Category::truncate();

        $data = [

            [
                'name' => "Kleding, mode & textiel",
                'color' => "#fd9100"
            ],
            [
                'name' => "Fairtrade winkel algemeen",
                'color' => "#de007a"
            ],
            [
                'name' => "Supermarkt",
                'color' => "#52351a"
            ],
            [
                'name' => "Overigen eten en drinken",
                'color' =>  "#6b8f00"
            ],
            [
                'name' => "Horeca",
                'color' =>  "#00828c"
            ],
            [
                'name' => "Overigen",
                'color' =>  "#62280f"
            ],

            [
                "name" => "Overheid & cultuur",
                'color' => "#ff0000",
            ],

            [
                "name" => "Onderwijs",
                'color' => "#ff0000",
            ],


        ];

        foreach($data as $category){
            $modelCategory = new Category;

            foreach($category as $column => $value){
                $modelCategory->$column = $value;
            }


            $modelCategory->save();
        }

    }
}