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
        echo 'Whooop!';
        if(isset($id))
        {
           $companies = Model\Category::find($id)->companies;
            echo 'By ID';
        } else{
            // Query all companies from database
            echo 'All';
            $companies = Model\Company::all();
        }

        //$testCompanies = Model\Category::find(1)->companies;
        //print_r($testCompanies);

        $categories = Model\Category::all();

		return \View::make("front.special.wheretobuy")->with(array(
				'title' => 'Waar te koop xxxxxxxxxxx',
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