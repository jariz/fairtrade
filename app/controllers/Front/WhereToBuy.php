<?php
/**
 * Wies Kueter
 * Date: 01/05/2014
 * Time: 14:28
 * Author: Wies Kueter
 */

namespace Front;
use Model;

class WhereToBuy extends BaseController 
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

	protected function show($id, $naam)
	{
        if(isset($id))
        {
            echo $id;
        }

		// Query all companies from database
		$companies = Model\Company::all();
        $companies = Model\Company::find(1)->categories;
        $categories = Model\Category::all();
		
		return \View::make("front.wheretobuy")->with(array(
				'title' => 'Waar te koop',
                'categories' => $categories,
				'companies' => $companies,
			)
		);
	}
}