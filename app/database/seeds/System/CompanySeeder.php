<?php
/**
 * Wies Kueter
 * Date: 17/05/2014
 * Time: 14:34
 * Author: Wies Kueter
 */

namespace System;
use \Fairtrade\IpsumGenerator;
use \Model\Company;

class CompanySeeder extends \Seeder
{
    private $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    public function run() {
        $this->letters = str_split($this->letters);

        Company::truncate();

        Company::create(array(
            "name" => "Albert Heijn Nieuwmarkt",
            "description" => IpsumGenerator::generateParagraphs(),
            "url" => "http://".IpsumGenerator::getWord().".com/",
            "user_id" => 1,
            "logo" => "../../images/albertHeijn.png",
            "accepted" => mt_rand(0, 1),
            "address" => "Nieuwmarkt 18",
            "city" => "Amsterdam",
            "postal_code" => "1012 CR",
            "lat" => "52.3702160",
            "lng" => "4.8951680",
            "contact_info" => IpsumGenerator::generateParagraphs(mt_rand(2, 4), mt_rand(30, 50), false),
        ));

        Company::create(array(
            "name" => "Albert Heijn Prins Hendrikkade",
            "description" => IpsumGenerator::generateParagraphs(),
            "url" => "http://".IpsumGenerator::getWord().".com/",
            "user_id" => 1,
            "logo" => "../../images/albertHeijn.png",
            "accepted" => 1,
            "address" => "Prins Hendrikkade 20",
            "city" => "Amsterdam",
            "postal_code" => "1012 TL",
            "lat" => "52.3785610",
            "lng" => "4.8961850",
            "contact_info" => IpsumGenerator::generateParagraphs(mt_rand(2, 4), mt_rand(30, 50), false),
        ));

        Company::create(array(
            "name" => "Albert Heijn Prins Jodenbreestraat",
            "description" => IpsumGenerator::generateParagraphs(),
            "url" => "http://".IpsumGenerator::getWord().".com/",
            "user_id" => 1,
            "logo" => "../../images/albertHeijn.png",
            "accepted" => mt_rand(0, 1),
            "address" => "Jodenbreestraat 21",
            "city" => "Amsterdam",
            "postal_code" => "1011 NH",
            "lat" => "52.3692770",
            "lng" => "4.9028070",
            "contact_info" => IpsumGenerator::generateParagraphs(mt_rand(2, 4), mt_rand(30, 50), false),
        ));

        Company::create(array(
            "name" => "Albert Heijn Prins Jodenbreestraat",
            "description" => IpsumGenerator::generateParagraphs(),
            "url" => "http://".IpsumGenerator::getWord().".com/",
            "user_id" => 1,
            "logo" => "../../images/albertHeijn.png",
            "accepted" => mt_rand(0, 1),
            "address" => "Nieuwezijds Voorburgwal 226",
            "city" => "Amsterdam",
            "postal_code" => "1012 RR",
            "lat" => "52.3726670",
            "lng" => "4.8907350",
            "contact_info" => IpsumGenerator::generateParagraphs(mt_rand(2, 4), mt_rand(30, 50), false),
        ));
    }
}