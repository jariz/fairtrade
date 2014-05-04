<?php
/**
 * Wies Kueter
 * Date: 01/05/2014
 * Time: 14:28
 * Author: Wies Kueter
 */

namespace Front;
use Model;

class WhereToBuy extends \Controller 
{
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
		// Query all companies from database
		$companies = Model\Company::all();
		
		return \View::make("front.wheretobuy")->with(array(
				'title' => 'Waar te koop',
				'companies' => $companies,
			)
		);
	}
}