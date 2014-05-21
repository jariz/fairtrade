<?php
/**
 * Wies Kueter
 * Date: 02/05/2014
 * Time: 18:05
 * Author: Wies Kueter
 */

namespace Front;
use Model;
use Input;
use Upload;
use Validator;
use Redirect;

class Company extends BaseController
{

    protected function registerAccount()
    {
        return \View::make("front.special.registerAccount")->with(array(
            'title' => 'Account aanmaken',
        ));
    }

	/**
	 * Controller to apply a new company
	 * @return void
	 */
	protected function details()
	{
        $categories = Model\Category::lists('name', 'id');

		return \View::make("front.special.applycompany")->with(array(
			'title' => 'Bedrijf aanmelden',
            'categories' => $categories
		));
	}

	protected function add()
	{
		$company = new Model\Company;

		$inputs = Input::all();
		//dd($inputs);

		$geo_location = '';
		
		/* Convert the address to a geo location with the Googele Maps API */
		$address = str_replace(' ', '%20', Input::get('postal_code') .'%20'. Input::get('address'));
		$url = 'https://maps.googleapis.com/maps/api/geocode/json?address='. $address .'&sensor=false';
		$jsonData = file_get_contents($url);
		$data = json_decode($jsonData);

		/* Form validation */
		$rules = array(
            'name' => 'required',
            'description' => 'required',
            'url' => 'required',
            'business_hours' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            'contact_info' => 'required',
		);

		$validation = Validator::make($inputs, $rules);

		if($validation->fails())
		{
			//return Redirect::to('bedrijf-aanmelden')->with_errors($validation->errors);
			return Redirect::back()->withErrors($validation->messages())->withInput();
		} else{
            /* Loop through all fields */
            $fields = array(
                'name',
                'description',
                'url',
                'business_hours',
                'address',
                'postal_code',
                'city',
                'contact_info',
                'category'
            );

            /* Add new company to database */
            foreach($fields as $field)
            {
                $company->{$field} = Input::get($field);
            }

            if(isset($data->results[0]->geometry->location)) {
                $company->lat = $data->results[0]->geometry->location->lat;
                $company->lng = $data->results[0]->geometry->location->lng;
            }

            //Upload logo
            $uploader = new \Fairtrade\Upload\Logo('logo');
            $company->logo = $uploader->getPath() .'.'. $uploader->getFilename();

            if($company->save())
            {
                // Get id of current company
                /*$currentCompnayId = $company->id;

                foreach(Input::get('category') as $category)
                {
                    $category->company_id = $currentCompnayId;
                    $category->category_id = category->id;
                }*/
                return Redirect::to('bedrijf-aanmelden/betalen');
            }
		}
	}

    protected function registerUser()
    {
        $user = new Model\User;

        $inputs = Input::all();

        /* Form validation */
        $rules = array(
            'name' => 'required',
            'email' => 'email|required',
            'password' => 'required|min:5',
            'confirmation' => 'required:same:password',
        );

        $validation = Validator::make($inputs, $rules);

        if($validation->fails())
        {
            //return Redirect::to('bedrijf-aanmelden')->with_errors($validation->errors);
            return Redirect::back()->withErrors($validation->messages())->withInput();
        } else{
            /* Loop through all fields */
            $fields = array(
                'name',
                'email',
            );

            /* Add new user to database */
            foreach($fields as $field)
            {
                $user->{$field} = Input::get($field);
            }
            $user->password = \Hash::make(Input::get('password'));
            if($user->save())
            {
                return Redirect::to('bedrijf-aanmelden/bedrijfsgegevens');
            }
        }
    }

    protected function payment()
    {
        // Ideal implementation
        return \View::make("front.payment")->with(array(
            'title' => 'Betalingsgegevens',
        ));
    }

	protected function AjaxGetCompanies()
	{
        header('Access-Control-Allow-Origin: *');

        //Query all companies from database
		$companyModel = new Model\Company;
        $companyFields = Input::get('fields');

        // Get all fields for company with id
        if(Input::get('id'))
        {
            $companyObject = $companyModel::find(Input::get('id'));
            $companyObject['category'] = 'wdaf';
            // Get fields specified for single company
            if($companyFields)
            {
                $companyFields = explode(',', $companyFields);
                foreach($companyFields as $companyField)
                {
                    $companyObjectCustom[$companyField] = $companyObject->{$companyField};
                }

                return $companyObjectCustom;
            } else{
                return $companyObject;
            }
        } else

        if(!Input::get('id'))
        {
            if($companyFields)
            {
                $companyObject = $companyModel::where('accepted', '=', 1)->get(array('id', 'lat', 'lng'));
            } else{
                $companyObject = $companyModel::where('accepted', '=', 1)->get();
            }
            // Get fields specified for all companies
            /*if($companyFields)
            {
                $companyFields = explode(',', $companyFields);
                foreach($companyObject as $object)
                {
                    $companiesArray[] = 'Test';
                    foreach($companyFields as $companyField)
                    {
                        $$companyField = $companyField;
                         //$companyObjectCustom[$companyField] = $companyObject->{$companyField};
                    }
                }
                //return $companyObjectCustom;
            } else{
                return $companyObject;
            }*/

            return $companyObject;
        }

        /*if(Input::get('type') === 'company')
        {
            // Get all fields for company with id
            if(Input::get('id'))
            {
                $companyObject = $companyModel::find(Input::get('id'));
                $companyFields = explode(',', $companyFields);

                foreach($companyFields as $companyField)
                {
                    $companyObject[$companyField] = $companyObject->{$companyField};
                }
                return $companyObject;


         /*if(isset($_GET['type']))
         {
             if($_GET['type'] === 'locations')
             {
                 $companies = $companyModel::where('accepted', '=', 1)->get();

                 // Prepare array to return as json object
                 $company_locations = array();

                 // Add companies to json object
                 foreach($companies as $company)
                 {
                     $company_locations[] = array(
                         'id' => $company["id"],
                         'description' => $company['description'],
                         'lat' => $company['lat'],
                         'lng' => $company['lng']
                     );
                 }
                 return $company_locations;
             } else
                 if(Input::get('type') === 'company' && Input::get('id'))
             {
                 $companyObject = $companyModel::find(Input::get('id'));
                 $companyFields = Input::get('fields');

                 if($companyFields)
                 {
                     $companyFields = explode(',', $companyFields);
                     foreach($companyFields as $companyField)
                     {
                         $company_details[$companyField] = $companyObject->{$companyField};
                     }
                 } else{
                     $company_details = array(
                         'name' => $companyObject->name,
                         'description' => $companyObject->description,
                         'logo' => $companyObject->logo,
                         'address' => $companyObject->address,
                         'postal_code' => $companyObject->postal_code,
                         'city' => $companyObject->city,
                         'lat' => $companyObject->lat,
                         'lng' => $companyObject->lng,
                         'contact_info' => $companyObject->contact_info,
                         'business_hours' => $companyObject->business_hours
                     );
                 }
                 return $company_details;
             }
         }*/
	}
}