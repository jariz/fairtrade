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

        $companies = [

            [
                "name" => "Albert Heijn Nieuwmarkt",
                "user_id" => 1,
                "logo" => "albertHeijn.png",
                "address" => "Nieuwmarkt 18",
                "city" => "Amsterdam",
                "postal_code" => "1012 CR",
                "lat" => "52.3702160",
                "lng" => "4.8951680",
                "category" => 3,
            ],
            [
                "name" => "Albert Heijn Prins Hendrikkade",
                "logo" => "../../images/albertHeijn.png",
                "address" => "Prins Hendrikkade 20",
                "city" => "Amsterdam",
                "postal_code" => "1012 TL",
                "lat" => "52.3785610",
                "lng" => "4.8961850",
                "category" => 3,

            ],
            [
                "name" => "Albert Heijn Prins Jodenbreestraat",
                "logo" => "../../images/albertHeijn.png",
                "address" => "Jodenbreestraat 21",
                "city" => "Amsterdam",
                "postal_code" => "1011 NH",
                "lat" => "52.3692770",
                "lng" => "4.9028070",
                "category" => 3,
            ],
            [
                "name" => "Albert Heijn Prins Jodenbreestraat",
                "logo" => "../../images/albertHeijn.png",
                "address" => "Nieuwezijds Voorburgwal 226",
                "city" => "Amsterdam",
                "postal_code" => "1012 RR",
                "lat" => "52.3726670",
                "lng" => "4.8907350",
                "category" => 3,
            ],

            [
                "name" => "AH Food Plaza",
                "logo" => "../../images/albertHeijn.png",
                "address" => "Nieuwezijds Voorburgwal 226",
                "city" => "Amsterdam",
                "postal_code" => "1012 RR",
                "lat" => "52.3726670",
                "lng" => "4.8907350",
                "category" => 3,
            ],
            [
                "name" => "AH Museumplein",
                "logo" => "../../images/albertHeijn.png",
                "address" => "van Baerlestraat 33a",
                "city" => "Amsterdam",
                "postal_code" => "1071 AP",
                "lat" => "52.3570290",
                "lng" => "4.8799090",
                "category" => 3,
            ],
            [
                "name" => "AH XL",
                "logo" => "../../images/albertHeijn.png",
                "address" => "Osdorperplein 469",
                "city" => "Amsterdam",
                "postal_code" => "1068 SZ",
                "lat" => "52.3647730",
                "lng" => "4.7854590",
                "category" => 3,
            ],
            [
                "name" => "Amsterdam Cupcake Company",
                "logo" => "../../images/albertHeijn.png",
                "address" => "Marco Polostraat 209",
                "city" => "Amsterdam",
                "postal_code" => "1057 WK",
                "lat" => "52.3647730",
                "lng" => "4.7854590",
                "category" => 4,
            ],
            [
                "name" => "Deen Supermarkt",
                "logo" => "../../images/albertHeijn.png",
                "address" => "Rijnstraat 152",
                "city" => "Amsterdam",
                "postal_code" => "1079 HP",
                "lat" => "52.3432700",
                "lng" => "4.9060540",
                "category" => 3,
            ],
            [
                "name" => "Deen Supermarkt",
                "logo" => "../../images/albertHeijn.png",
                "address" => "Nierstraat 16",
                "city" => "Amsterdam",
                "postal_code" => "1078 VK",
                "lat" => "52.3434160",
                "lng" => "4.8951440",
                "category" => 3,
            ]



        ];



       foreach($companies as $company){
           $modelCompany = new Company;

           foreach($company as $column => $value){
                $modelCompany->$column = $value;
           }


           $modelCompany->save();
       }
    }
}