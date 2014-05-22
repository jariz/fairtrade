<?php
/**
 * JARIZ.PRO
 * Date: 22/05/2014
 * Time: 15:52
 * Author: JariZ
 */

namespace Front;


class Api extends BaseController {
    /**
     * @param \Eloquent $model The model
     * @param $accepted boolean Only get accepted rows.
     */
    function query(\Eloquent $model, $accepted=false) {
        // Check if id parameter is given
        $id = \Input::get("id");

        // Collect all requested fields
        $fields = explode(',', \Input::get('fields') );

        foreach( $fields as $key => $field){
            if( empty( $field ) || !\Schema::hasColumn('companies', $field))
                unset($fields[$key]);
        }
        
        if($accepted)
            $model = $model::whereAccepted(1);

        if(count( $fields) == 0)
            $fields = ['*'];

        if($id)
            $model = $model->whereId($id);

        $result = $model->get($fields);

        return \Response::json($result->toArray(), 200, array
        (
            "Access-Control-Allow-Origin" => "*"
        ));
    }

    public function companies() {
        return $this->query(new \Model\Company, true);
    }

    public function categories() {
        return $this->query(new \Model\Category);
    }
} 