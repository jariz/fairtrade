<?php
/**
 * JARIZ.PRO
 * Date: 24/04/2014
 * Time: 09:38
 * Author: JariZ
 */

namespace Admin;


class Dashboard extends AdminController {
    public function show() {
        return \View::make("admin.dashboard");
    }
} 