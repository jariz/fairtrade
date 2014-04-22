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
        Page::truncate();
        for ($i = 1; $i <= 5; $i++) {
            Page::create(array(
                "title" => IpsumGenerator::generateParagraphs(1, 4, false),
                "slug" => IpsumGenerator::getWord(),
                "content" => IpsumGenerator::generateParagraphs(),
                "published" => mt_rand(0,1)
            ));

        }
    }

} 