<?php

namespace Front;
use View, Session, Request;
use Model\Page;
class BaseController extends \Controller {

    public function __construct(){
//        parent::__construct();
        View::share("title", "!GEEN TITEL!");
        View::share("template", \Config::get("fairtrade.template"));
//        Session::forget('popup');
        $this->checkForPopup();
        $this->getMenuData();
        // Menu items ophalen

    }
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

    /**
     * Retrieves all the data to render the menu, and binds it to the view
     */
    private function getMenuData(){

        $menu = array();

        // Get all main menu items
        $menuData = Page::select(['id', 'menu_title', 'slug'])
            ->where('parent', '=', 0)
            ->where('show_in_nav', '=', 1)
            ->wherePublished(1)
            ->orderBy('order', 'ASC')
            ->get()
            ->toArray();

        // Get all sub items
        $subMenuData = Page::select(['menu_title', 'slug', 'parent'])
            ->where('parent', '!=', 0)
            ->where('show_in_nav', '=', 1)
            ->orderBy('order', 'ASC')
            ->get()
            ->toArray();


        $orderd = array();

        $classes = \Config::get("fairtrade.nav_classes");

        // Put all the main items in the array
        $i = 0;
        foreach($menuData as $item){
            if($i > count($classes) - 1 ) $i = 0;
            
                $item["class"] = $classes[$i];
                $orderd[$item['id']] = $item;
                $i++;

        }

        // Match all submenu items with the right parent
        foreach($subMenuData as $item){

            if(!array_key_exists($item['parent'], $orderd)){
                continue;
            }

            if( !isset( $orderd[$item['parent']]['sub_menu'] )){
                $orderd[$item['parent']]['sub_menu'] = array();
            }

            $orderd[$item['parent']]['sub_menu'][] = $item;
        }

        View::share('menuData', $orderd);
    }

    public function checkForPopup(){

        if( Session::has('popup') ){
           View::share('popup', false);
        } else{
            View::share('popup', true);
        }

    }

    /**
     * Make sure the popup will not be shown again
     */
    public function hidePopup(){

        if( Request::ajax() )
            Session::put( 'popup', false );
    }



}
