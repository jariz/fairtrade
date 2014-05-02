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
        return \Fairtrade\Date::input( $this->attributes['created_at'] )
            ->forHuman();
    }

    public function getUpdatedFormattedAttribute(){
        return \Fairtrade\Date::input( $this->attributes['updated_at'] )
            ->forHuman();
    }
} 