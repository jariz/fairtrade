<?php
/**
 * JARIZ.PRO
 * Date: 16/05/2014
 * Time: 10:44
 * Author: JariZ
 */

namespace Fairtrade\Page\Data;


use Fairtrade\Util;
use Model\Company;
use Model\Concept;
use Model\Post;

class Home extends Data {
    public function run() {
        //news
        $posts = Post::take(2)->get();
        $news = [];
        foreach($posts as $post) {
            $post->content = Util::truncate($post->content, 200);
            $news[] = $post;
        }
        $this->add("news", $news);

        //featured concept
        $featured = Concept::whereFeatured(1)->orderByRaw("RAND()")->first();
        $featured->content = Util::truncate($featured->content);
        $this->add("featured", $featured);

        //companies
        $companies = Company::orderBy("created_at")->take(10)->get();
        $this->add("companies", $companies);
    }
}