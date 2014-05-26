<?php
/**
 * Created by PhpStorm.
 * User: ssshenkie
 * Date: 5/19/14
 * Time: 10:21 PM
 */

namespace Front;
use Model\Event, View, DateTime;

class EventController extends BaseController {

    public function show($id, $title = null){
        $active = false;

        $eventItem = Event::findOrFail($id);
        $now =  new DateTime('today');

        if( new DateTime($eventItem->date) >= $now->modify('+1 day') ){
            $active = true;
        }

        return View::make('front.special.event-item')
            ->with('item', $eventItem)
            ->with('title', $eventItem->title)
            ->with('active', $active);
    }

} 