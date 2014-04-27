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
    private $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    public function run() {
        $this->letters = str_split($this->letters);



        Company::truncate();
        for ($i = 1; $i <= Config::get("seeding.amount"); $i++) {

            // Generate Postal code
            $postal_code = mt_rand(1000, 9999);

            $rand_keys = array_rand($this->letters, 2);

            foreach($rand_keys as $key){
                $postal_code.= $this->letters[$key];
            }


            Company::create(array(
                "name" => IpsumGenerator::generateParagraphs(1, mt_rand(2,6), false),
                "description" => IpsumGenerator::generateParagraphs(),
                "url" => "http://".IpsumGenerator::getWord().".com/",
                "user_id" => 1,
                "logo" => "",
                "accepted" => mt_rand(0, 1),
                "address" => IpsumGenerator::getWord(true) . ' '.mt_rand(1, 999),
                "city" => IpsumGenerator::getWord(true),
                "postal_code" => $postal_code,
                "contact_info" => IpsumGenerator::generateParagraphs(mt_rand(2, 4), mt_rand(30, 50), false),
            ));
        }
    }
} 