<?php
/**
 * JARIZ.PRO
 * Date: 22/04/2014
 * Time: 16:29
 * Author: JariZ
 */

use Model\Concept;
use Fairtrade\IpsumGenerator;
class ConceptSeeder extends Seeder {

    public function run() {
        Concept::truncate();
        for ($i = 1; $i <= Config::get("seeding.amount"); $i++) {
            Concept::create(array(
                "title" => IpsumGenerator::generateParagraphs(1, mt_rand(2,6), false),
                "content" => IpsumGenerator::generateParagraphs(),
                "published" => 1,
                "featured" => 0
            ));

        }
    }

} 