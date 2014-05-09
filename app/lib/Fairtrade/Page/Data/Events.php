<?php
/**
 * Created by PhpStorm.
 * User: ssshenkie
 * Date: 5/9/14
 * Time: 7:43 PM
 */

namespace Fairtrade\Page\Data;
use Model\Event;


class Events extends Data{

    public function run(){

        $events = Event::orderBy('created_at')
            ->paginate(10);

        $this->add('events', $events);
    }

} 