<?php
/**
 * Created by PhpStorm.
 * User: wieskueter.com
 * Date: 5/21/14
 * Time: 3:39 PM
 */

namespace Fairtrade;


class Map
{

    public static function convertAddress($postal_code, $address)
    {
        /* Convert the address to a geo location with the Googele Maps API */
        $address = str_replace(' ', '%20', $postal_code . '%20' . $address);
        $url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $address . '&sensor=false';
        $jsonData = file_get_contents($url);
        $data = json_decode($jsonData);

        $coords = [
            'lat' => NULL,
            'lng' => NULL
        ];

        if (isset($data->results[0]->geometry->location)) {
            $coords['lat'] = $data->results[0]->geometry->location->lat;
            $coords['lng'] = $data->results[0]->geometry->location->lng;


        }
        return $coords;
    }
} 