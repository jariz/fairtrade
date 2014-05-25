<?php
/**
 * Created by PhpStorm.
 * User: ssshenkie
 * Date: 5/19/14
 * Time: 11:34 PM
 */

namespace Front;
use Model\Concept, View;

class ConceptController extends BaseController{
    public function show($id, $title = null){
        $concept = Concept::with('company')->findOrFail($id);

        return View::make('front.special.concept-item')
                ->with('title', $concept->title)
                ->with('item', $concept);
    }
} 