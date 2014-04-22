<?php
/**
 * JARIZ.PRO
 * Date: 22/04/2014
 * Time: 14:08
 * Author: JariZ
 */

use Fairtrade\IpsumGenerator;
use Model\User;
class UserSeeder extends Seeder {
    public function run() {

        User::truncate();

        User::create(array(
            "id" => 1,
            "email" => "admin@fairtrade.org",
            "password" => Hash::make("123321"),
            "name" => "Admin Istrator",
            "admin" => 1,
            "ip" => "127.0.0.1",
            "reset_code" => str_random()
        ));

        for ($i = 1; $i <= Config::get("seeding.amount"); $i++)
            User::create(array(
                "email" => IpsumGenerator::getWord(). IpsumGenerator::getWord() . '@fairtrade.org',
                "password" => Hash::make(str_random(6)),
                "name" => studly_case(IpsumGenerator::getWord()) . " " . studly_case(IpsumGenerator::getWord()),
                "admin" => mt_rand(0,1),
                "ip" => mt_rand(100,999).".".mt_rand(10,99).".".mt_rand(10,99).".".mt_rand(10,99).".".mt_rand(10,99),
                "reset_code" => str_random()
            ));
    }
} 