<?php
/**
 * Created by PhpStorm.
 * User: ssshenkie
 * Date: 5/19/14
 * Time: 11:12 PM
 */

namespace Fairtrade\Page\Data;
use Model\Concept;

class Concepts extends Data{
    public function run(){
        $concepts = Concept::orderBy('created_at')->paginate(12);
        $this->add('concepts', $concepts);

        $featured = Concept::whereFeatured(1)->orderByRaw("RAND()")->take(4)->get();
        $this->add("featured", $featured);

    }
} 