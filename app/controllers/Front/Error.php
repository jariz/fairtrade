<?php
namespace Front;
use Response;
class Error extends BaseController{

    public function notFound(){
        return Response::view('front.errors.404', array('title'=> 'Pagina niet gevonden'), 404);
    }
}