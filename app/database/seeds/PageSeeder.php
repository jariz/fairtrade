<?php
/**
 * JARIZ.PRO
 * Date: 22/04/2014
 * Time: 16:33
 * Author: JariZ
 */

use Model\Page;
use Fairtrade\IpsumGenerator;
class PageSeeder extends Seeder {

    public function run() {
        $last = 0;

        /* Get Last order INT */
        $data = Page::where('parent', '=', 0)->orderBy('order', 'DESC')
                ->first();

        if($data->exists()){
            $last = $data['order'] + 1;
        }


        for ($i = $last; $i <= ($last + 2); $i++) {
            Page::create(array(
                "title" => IpsumGenerator::generateParagraphs(1, 4, false),
                "slug" => IpsumGenerator::getWord(),
                "content" => IpsumGenerator::generateParagraphs(),
                "published" => mt_rand(0,1),
                "special" => 0,
                "view" => NULL,
                "heading" => IpsumGenerator::generateParagraphs(1, 4, false),
                "menu_title" => IpsumGenerator::getWord(true),
                "show_in_nav" => mt_rand(0,1),
                "order" => $i,
                "parent" => 0
            ));

        }
    }

} 