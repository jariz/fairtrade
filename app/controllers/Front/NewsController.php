<?php
/**
 * Created by PhpStorm.
 * User: ssshenkie
 * Date: 5/19/14
 * Time: 8:25 PM
 */

namespace Front;
use Model\Post, View;

class NewsController extends BaseController {

    public function show($id, $title = null){
        $newsItem = Post::findOrFail($id);

        return View::make('front.special.news-item')
                ->with('item', $newsItem)
                ->with('title', $newsItem->title);
    }
} 