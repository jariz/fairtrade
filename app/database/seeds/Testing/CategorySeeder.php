<?php
/**
 * Wies Kueter
 * Date: 17/05/2014
 * Time: 14:34
 * Author: Wies Kueter
 */

namespace Testing;
use \Model\Category;
class CategorySeeder extends \Seeder {
    public function run()
    {
        Category::truncate();

        $category = new Category;
        $category->name = "Kleding/ fashion/ textiel";
        $category->color = "#fd9100";
        $category->save();

        $category = new Category;
        $category->name = "Fairtrade winkel algemeen";
        $category->color = "#de007a";
        $category->save();

        $category = new Category;
        $category->name = "Supermarkt, food, dranken";
        $category->color = "#52351a";
        $category->save();

        $category = new Category;
        $category->name = "Overigen food";
        $category->color = "#6b8f00";
        $category->save();

        $category = new Category;
        $category->name = "Horeca";
        $category->color = "#00828c";
        $category->save();

        $category = new Category;
        $category->name = "Overigen non-food";
        $category->color = "#62280f";
        $category->save();
    }
}