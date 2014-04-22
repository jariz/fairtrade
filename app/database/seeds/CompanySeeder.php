<?php
/**
 * JARIZ.PRO
 * Date: 22/04/2014
 * Time: 16:03
 * Author: JariZ
 */

use Fairtrade\IpsumGenerator;
use Model\Company;
class CompanySeeder extends Seeder {
    public function run() {

        Company::truncate();
        for ($i = 1; $i <= Config::get("seeding.amount"); $i++) {
            Company::create(array(
                "name" => IpsumGenerator::generateParagraphs(1, mt_rand(2,6), false),
                "description" => IpsumGenerator::generateParagraphs(),
                "url" => "http://".IpsumGenerator::getWord().".com/",
                "user_id" => 1,
                "logo" => "",
                "adres" => IpsumGenerator::getWord(true)."street ".mt_rand(10,99),
            ));
        }
    }
} 