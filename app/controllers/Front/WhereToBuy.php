<?php

namespace Front;

class WhereToBuy extends \Controller {

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

	protected function show()
	{
		return \View::make("front.wheretobuy")->with('title', '');
	}

}
