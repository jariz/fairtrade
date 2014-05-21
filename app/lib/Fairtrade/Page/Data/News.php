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
        // Get All news items
       $news = Post::wherePublished(1)
            ->orderBy('created_at')
            ->paginate(3);


       // Share data with view
       $this->add('news', $news);

    }
} 