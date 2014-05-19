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
        // Get All news items
        $concepts = Concept::orderBy('created_at')
            ->paginate(10);


        // Share data with view
        $this->add('concepts', $concepts);

    }
} 