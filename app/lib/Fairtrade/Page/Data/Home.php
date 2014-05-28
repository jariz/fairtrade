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
        $featured = Concept::whereFeatured(1)->whereAccepted(1)->orderByRaw("RAND()")->first();
        if($featured) {
            $featured->content = Util::truncate($featured->content);
            $this->add("featured", $featured);
        }

        //featured concepts
        $featureds = Concept::whereFeatured(1)->whereAccepted(1)->orderByRaw("RAND()")->take(4)->get();
        $this->add("featureds", $featureds);

        //companies
        $companies = Company::whereAccepted(1)->orderByRaw("RAND()")->take(4)->get();
        $this->add("companies", $companies);
    }
}