<?php
/**
 * Created by PhpStorm.
 * User: ssshenkie
 * Date: 5/9/14
 * Time: 4:26 PM
 */

namespace Fairtrade\Page\Data;
use Model\Post;

class News extends Data{

    public function run(){
        $news = Post::wherePublished(1)->orderBy('created_at');

        if(\Input::has("archive")) {
            $news = $news->paginate(10);
        } else {
            $news = $news->take(3)->get();
        }

       // Share data with view
       $this->add('news', $news);
       $this->add('archive', \Input::has("archive"));

    }
} 