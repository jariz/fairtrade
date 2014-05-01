<?php

namespace Front;
use View;
class BaseController extends \Controller {

    public function __construct(){
//        parent::__construct();
        View::share("title", "!GEEN TITEL!");
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

}
