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
        $category_id = '';

        if(isset($id))
        {
           $companies = Model\Company::where('category', '=', $id)->where('accepted', '=', 1)->get();
           $category_id = $id;
           //$companies = Model\Category::with('companies')->where('accepted', '=', 1)->find($id);
           //$companies = Model\Company::with('categories')->where('accepted', '=', 1)->find($id);
           /*$companies = Model\Category::with(['companies' => function($query){
                return $query->where('accepted', '=', 1);
            }])->find($id);*/
        } else{
            // Query all companies from database
            $companies = Model\Company::where('accepted', '=', 1)->get();
        }

        //$testCompanies = Model\Category::find(1)->companies;
        //print_r($testCompanies);

        $categories = Model\Category::all();

		return \View::make("front.special.wheretobuy")->with(array(
				'title' => 'Waar te koop',
                'categories' => $categories,
				'companies' => $companies,
                'category_id' => $category_id
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