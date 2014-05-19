<?php
/**
 * Created by PhpStorm.
 * User: wieskueter.com
 * Date: 5/14/14
 * Time: 11:54 AM
 */
namespace Front;
use Model;

class Category extends BaseController
{
    protected function ajaxGetCategories()
    {
        if(isset($id))
        {
            $categories = Model\Category::find($id)->companies;
        } else{
            $categories = Model\Category::all();
        }
        return $categories;
    }
}