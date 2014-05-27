<?php
/**
 * Created by PhpStorm.
 * User: ssshenkie
 * Date: 5/1/14
 * Time: 12:25 PM
 */

namespace Front;
use View, App, Model, Fairtrade;

class DynamicPage extends BaseController{

    /**
     * Instance Eloquent model of the current page
     * @author Dmitri Chebotarev
     * @var Model\Page
     */
    private $page;

    /**
     * Holds optional URL parameters
     * @author Dmitri Chebotarev
     * @var $params
     */
    private $params = null;

    /**
     * @param string $slug - The slug of the current page, must exist in pages table
     * @author Dmitri Chebotarev
     * @return View
     */
    public function get( $slug = 'home', $params = null){

        $this->page = Model\Page::whereSlug( $slug );


        if( !is_null( $params ) ){
            $this->params = array_filter( explode('/', $params) );

        }

        if( !$this->page->exists() ){
            return $this->notFound();
        }

        if( $this->page->published == 0 && !Fairtrade\User::isAdmin() ){
            return $this->notFound();
        }

        if( $this->page->special == 1){
            return $this->renderSpecial();
        }

        return $this->render();
    }

    /**
     * Show 404 error
     * @author Dmitri Chebotarev
     * @return View
     */
    private function notFound(){
        return App::abort(404);
    }

    /**
     * Render the current page
     * @author Dmitri Chebotarev
     * @return View
     */
    private function render(){
       return View::make('front.dynamic')
                ->with('title', $this->page->title)
                ->with('seo_description', $this->page->seo_description)
                ->with('page', $this->page);
    }

    /**
     * Render a 'Special' page
     * @author Dmitri Chebotarev
     * @return View
     */
    private function renderSpecial(){

        if( !View::exists($this->page->view) ){
            return $this->notFound();
        }



        // Run script to inject important data

        if( !is_null( $this->page->data_source ) ){

            $dataSourceClass = "Fairtrade\\Page\\Data\\". $this->page->data_source;

            if( class_exists( $dataSourceClass) ){

                $dataSource = new $dataSourceClass( $this->page );
                $dataSource->run( $this->params );


                // Check if 404 is triggerd
                if( !$dataSource->exists() ){
                    return App::abort(404);
                }

                if( $dataSource->hasCustomView() ){
                    $this->page->view = $dataSource->getCustomView();
                }



            }
        }

        $view = View::make( $this->page->view )
            ->with('title', $this->page->title)
            ->with('seo_description', $this->page->seo_description);



        $metaData = json_decode( $this->page->meta);

        if( !is_null($metaData) ){

            foreach($metaData as $key => $data ){
                $view->with($key, $data->value);
            }
        }

        return $view;
    }
} 