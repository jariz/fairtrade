<?php
/**
 * JARIZ.PRO
 * Date: 22/05/2014
 * Time: 09:55
 * Author: JariZ
 */

namespace System;


class AdminSeeder extends \Seeder{
    public function run() {
        $user = new \Model\User;
        $user->email = 'admin@fairtradeamsterdam.nl';
        $user->password = \Hash::make("123321");
        $user->name = "@- Istrator";
        $user->reset_code = str_random();
        $user->role_id = 1;
        $user->save();
    }
} 