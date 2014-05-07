<?php
/**
 * JARIZ.PRO
 * Date: 22/04/2014
 * Time: 16:25
 * Author: JariZ
 */
namespace Testing;
use \Model\Event;
use \Fairtrade\IpsumGenerator;
use \Fairtrade\Date;
class EventSeeder extends \Seeder {

    public function run() {
        Event::truncate();
        for ($i = 1; $i <= \Config::get("seeding.amount"); $i++) {
            Event::create(array(
                "title" => IpsumGenerator::generateParagraphs(1, mt_rand(3,6), false),
                "location" => IpsumGenerator::getWord(true)."straat ".mt_rand(10,99),
                "description" => IpsumGenerator::generateParagraphs(),
                "date" => Date::input(date("d-m-Y H:i:s", time() + mt_rand(1000,9999)))->forDatabase()
            ));
        }
    }

}