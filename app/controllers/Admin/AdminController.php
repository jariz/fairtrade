<?php
/**
 * JARIZ.PRO
 * Date: 24/04/2014
 * Time: 09:39
 * Author: JariZ
 */

namespace Admin;


class AdminController extends \Controller {
    public function __construct() {
        \View::share("title", "!GEEN TITEL!");
        $this->beforeFilter("auth");
    }
} 