<?php

namespace Front;
use Model;

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
		$companies = Model\Company::all();
		//print_r($companies);
		
		return \View::make("front.wheretobuy")->with(array(
				'title' => 'Waar te koop',
				'companies' => $companies,
			)
		);
	}

}
