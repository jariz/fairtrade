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
     * @var Model\Page
     */
    private $page;

    /**
     * @param string $slug - The slug of the current page, must exist in pages table
     * @return View
     */
    public function get( $slug = NULL ){

        if (is_null($slug) ){
            return $this->notFound();
        }

        $this->page = Model\Page::whereSlug( $slug );

        if( !$this->page->exists() ){
            return $this->notFound();
        }

        if( $this->page->published == 0 && !Fairtrade\User::isAdmin() ){
            return $this->notFound();
        }

        return $this->render();
    }

    /**
     * Show 404 error
     * @return View
     */
    private function notFound(){
        return App::abort(404);
    }

    /**
     * Render the current page
     * @return View
     */
    private function render(){
       return View::make('front.dynamic')
                ->with('title', $this->page->title)
               ->with('page', $this->page);
    }
} 