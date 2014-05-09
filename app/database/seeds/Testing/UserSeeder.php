<?php
/**
 * JARIZ.PRO
 * Date: 22/04/2014
 * Time: 14:08
 * Author: JariZ
 */
namespace Testing;
use \Fairtrade\IpsumGenerator;
use \Model\User;
class UserSeeder extends \Seeder {
    public function run() {

        User::truncate();


        $user = new User;
        $user->email = 'admin@fairtrade.org';
        $user->password = \Hash::make("123321");
        $user->name = "@- Istrator";
//        $user->ip = "127.0.0.1";
        $user->reset_code = str_random();
        $user->role_id = 1;
        $user->save();

        $user = new User;
        $user->email = 'ondernemer@fairtrade.org';
        $user->password = \Hash::make("123321");
        $user->name = "Ondernemer";
//        $user->ip = "127.0.0.1";
        $user->reset_code = str_random();
        $user->role_id = 2;
        $user->save();

        $user = new User;
        $user->email = 'redacteur@fairtrade.org';
        $user->password = \Hash::make("123321");
        $user->name = "Redacteur";
//        $user->ip = "127.0.0.1";
        $user->reset_code = str_random();
        $user->role_id = 3;
        $user->save();

        for ($i = 1; $i <= \Config::get("seeding.amount"); $i++) {

            $date = new \DateTime;
            $start = $date->format('Y-m-d H:i:s');
            $date->modify('+'.mt_rand(1, 12). ' month');
            $end = $date->format('Y-m-d H:i:s');


            $user = new User;
            $user->email = IpsumGenerator::getWord(). IpsumGenerator::getWord() . '@fairtrade.org';
            $user->password = \Hash::make(str_random(6));
            $user->name = studly_case(IpsumGenerator::getWord()) . " " . studly_case(IpsumGenerator::getWord());
//            $user->ip = mt_rand(1,99).".".mt_rand(1,99).".".mt_rand(1,99).".".mt_rand(1,99);
            $user->reset_code = str_random();
            $user->role_id = mt_rand(1, 3);
            $user->subscription_start = $start;
            $user->subscription_end = $end;
            $user->save();
        }
    }
} 