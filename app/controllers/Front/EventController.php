<?php
/**
 * Created by PhpStorm.
 * User: ssshenkie
 * Date: 5/19/14
 * Time: 10:21 PM
 */

namespace Front;
use Model\Event, View;

class EventController extends BaseController {

    public function show($id, $title = null){
        $eventItem = Event::orderBy('date', 'DESC')->findOrFail($id);

        return View::make('front.special.event-item')
            ->with('item', $eventItem)
            ->with('title', $eventItem->title);
    }

} 