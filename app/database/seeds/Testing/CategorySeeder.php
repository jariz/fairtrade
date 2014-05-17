<?php
/**
 * Wies Kueter
 * Date: 17/05/2014
 * Time: 14:34
 * Author: Wies Kueter
 */

namespace Testing;
use \Model\Category;

class CategorySeeder extends \Seeder
{
    public function run()
    {
        //Category::truncate();

        Category::create(array(
            "name" => "Supermarkten",
        ));
    }
}