<?php
/**
 * JARIZ.PRO
 * Date: 02/05/2014
 * Time: 13:29
 * Author: JariZ
 */

namespace Model;


class FormattedTimestamps extends \Eloquent {

    protected $appends = [
        'created_formatted',
        'updated_formatted'
    ];

    public function getCreatedFormattedAttribute(){

        if( !array_key_exists('created_at', $this->attributes ))
               return NULL;
        return \Fairtrade\Date::input( $this->attributes['created_at'] )
            ->forHuman();
    }

    public function getUpdatedFormattedAttribute(){
        if( !array_key_exists('updated_at', $this->attributes ))
            return NULL;
        return \Fairtrade\Date::input( $this->attributes['updated_at'] )
            ->forHuman();
    }
} 