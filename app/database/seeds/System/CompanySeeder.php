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
use Image;

class CompanySeeder extends \Seeder
{

    public function run() {

        Company::truncate();

        $companies = [
            [
                "name" => "AH Food Plaza",
                "address" => "Nieuwezijds Voorburgwal 226",
                "city" => "Amsterdam",
                "postal_code" => "1012 RR",
                "category" => 3,
                "logo" => "EYgGsiTsuY33MmsoyCiE7sipgofTdi.png"
            ],
            [
                "name" => "AH Museumplein",
                "address" => "van Baerlestraat 33a",
                "city" => "Amsterdam",
                "postal_code" => "1071 AP",
                "category" => 3,
                "logo" => "EYgGsiTsuY33MmsoyCiE7sipgofTdi.png"
            ],
            [
                "name" => "AH XL",
                "address" => "Osdorperplein 469",
                "city" => "Amsterdam",
                "postal_code" => "1068 SZ",
                "category" => 3,
                "logo" => "EYgGsiTsuY33MmsoyCiE7sipgofTdi.png"
            ],
            [
                "name" => "Amsterdam Cupcake Company",
                "address" => "Marco Polostraat 209",
                "city" => "Amsterdam",
                "postal_code" => "1057 WK",
                "category" => 4,
                "logo" => "EYgGsiTsuY33MmsoyCiE7sipgofTdi.png"
            ],
            [
                "name" => "Deen Supermarkt",
                "address" => "Rijnstraat 152",
                "city" => "Amsterdam",
                "postal_code" => "1079 HP",
                "category" => 3,
                "logo" => "deen.jpg"
            ],
            [
                "name" => "Deen Supermarkt",
                "address" => "Nierstraat 16",
                "city" => "Amsterdam",
                "postal_code" => "1078 VK",
                "category" => 3,
                "logo" => "deen.jpg"
            ],
            [
                "name" => "Deen Supermarkt",
                "address" => "Rietwijkerstraat 42-44",
                "city" => "Amsterdam",
                "postal_code" => "1059 XB",
                "category" => 3,
            ],
            [
                "name" => "Frank@Fair",
                "address" => "Czaar Peterstraat 68",
                "city" => "Amsterdam",
                "postal_code" => "1018 PR",
                "category" => 2,
                "logo" => "deen.jpg"
            ],
            [
                "name" => "Gall & Gall",
                "address" => "Buitenvelderstelaan 176",
                "city" => "Amsterdam",
                "postal_code" => "1081 AC",
                "category" => 3,
            ],
            [
                "name" => "Jumbo",
                "address" => "Buitenvelderstelaan 184",
                "city" => "Amsterdam",
                "postal_code" => "1081 AC",
                "category" => 3,
            ],
            [
                "name" => "Marqt Overtoom",
                "address" => "Overtoom 21",
                "city" => "Amsterdam",
                "postal_code" => "1054 HC",
                "category" => 3,
            ],
            [
                "name" => "Milagros Mundo",
                "address" => "Postjesweg 23",
                "city" => "Amsterdam",
                "postal_code" => "1057 DV",
                "category" => 2,
            ],
            [
                "name" => "Nukuhiva",
                "address" => "Haarlemmerstraat 36",
                "city" => "Amsterdam",
                "postal_code" => "1013 ES",
                "category" => 1,
            ],
            [
                "name" => "Plus supermarkt",
                "address" => "Bezaanjachtplein 291",
                "city" => "Amsterdam",
                "postal_code" => "1034 CR",
                "category" => 3,
            ],
            [
                "name" => "Spar",
                "address" => "Nieuwe Kerkstraat 65",
                "city" => "Amsterdam",
                "postal_code" => "1018 DZ",
                "category" => 3,
            ],
            [
                "name" => "Spar de Winter",
                "address" => "Osdorperban 116-122",
                "city" => "Amsterdam",
                "postal_code" => "1068 MK",
                "category" => 3,
            ],
            [
                "name" => "Spar Steur",
                "address" => "Spaarndammerstraat 544",
                "city" => "Amsterdam",
                "postal_code" => "1013 TH",
                "category" => 3,
            ],
            [
                "name" => "Tony Chocolonely",
                "address" => "Polonceaukade 12",
                "city" => "Amsterdam",
                "postal_code" => "1014 DA",
                "category" => 4,
            ],
            [
                "name" => "Waarwinkel",
                "address" => "Bilderdijkstraat 57",
                "city" => "Amsterdam",
                "postal_code" => "1053 KM",
                "category" => 2,
            ],
            [
                "name" => "Wereldwinkel ABAL",
                "address" => "Ceintuurbaan 266",
                "city" => "Amsterdam",
                "postal_code" => "1072 GJ",
                "category" => 2,
            ],
            [
                "name" => "Koninklijk Instituut voor de Tropen",
                "address" => "Mauritskade 63",
                "city" => "Amsterdam",
                "postal_code" => "1092 AD",
                "category" => 7,
            ],
            [
                "name" => "M”venpick Hotel Amsterdam City Centre",
                "address" => "Piet Heinkade 11",
                "city" => "Amsterdam",
                "postal_code" => "1019 BR",
                "category" => 5,
            ],
            [
                "name" => "St. Ignatiusgymnasium",
                "address" => "De Klencke 4",
                "city" => "Amsterdam",
                "postal_code" => "1083 HH",
                "category" => 8,
            ],
            [
                "name" => "rije Universiteit Amsterdam",
                "address" => "De Boelelaan 1105",
                "city" => "Amsterdam",
                "postal_code" => "1081 HV",
                "category" => 8,
            ],





        ];



       foreach($companies as $company){
           $modelCompany = new Company;

           foreach($company as $column => $value){
                $modelCompany->$column = $value;

               if($column === 'logo'){
                   $img = Image::make( public_path().'uploads/logos'.$value );
                   $img->resize(300, 300)->save( public_path().'uploads/logos/t/'.$value);
               }
           }


           $modelCompany->save();
       }
    }
}