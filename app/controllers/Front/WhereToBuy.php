<?php
/**
 * Wies Kueter
 * Date: 01/05/2014
 * Time: 14:28
 * Author: Wies Kueter
 */

namespace Front;
use Base;
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

	protected function show($id = null, $naam = null)
	{
        if(isset($id))
        {
           $companies = Model\Category::find($id)->companies;
        } else{
            // Query all companies from database
            $companies = Model\Company::all();
        }

        //$testCompanies = Model\Category::find(1)->companies;
        //print_r($testCompanies);

        $categories = Model\Category::all();
		
		return \View::make("front.special.wheretobuy")->with(array(
				'title' => 'Waar te koop',
                'categories' => $categories,
				'companies' => $companies,
			)
		);
	}

    protected function detail($id = null)
    {
        if(isset($id))
        {
            // Select company with id
            $company = Model\Company::find($id);
        } else{
            // Company does not exist
        }

        //$testCompanies = Model\Category::find(1)->companies;
        //print_r($testCompanies);

        $categories = Model\Category::all();

        return \View::make("front.companydetail")->with(array(
                'title' => 'Bedrijf detail',
                'company' => $company
            )
        );
    }
}