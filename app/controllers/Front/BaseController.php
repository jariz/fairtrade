<?php

namespace Front;
use View;
use Model\Page;
class BaseController extends \Controller {

    public function __construct(){
//        parent::__construct();
        View::share("title", "!GEEN TITEL!");

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


        // Put all the main items in the array
        foreach($menuData as $item){
            $orderd[$item['id']] = $item;
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


}
