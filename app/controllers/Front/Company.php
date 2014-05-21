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
use Schema;
use Response;
use Fairtrade\Map;

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

        $coords = Map::convertAddress(Input::get('postal_code'), Input::get('address'));

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

            // Save coordinates
            $company->lat = $coords['lat'];
            $company->lng = $coords['lng'];

            //Upload logo
            $uploader = new \Fairtrade\Upload\Logo('logo');

            if($company->save())
            {
                $company->logo = $uploader->getFilename();

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
		$companyModel = new Model\Company;

        $id = false;

        // Check if id parameter is given
        if( !is_null(Input::get('id')) )
        {
            $id = Input::get('id');
        }

        // Collect all requested fields
        $companyFields = explode(',', Input::get('fields') );

        foreach( $companyFields as $key => $field){
            if( empty( $field ) || !Schema::hasColumn('companies', $field)){
                unset($companyFields[$key]);
            }
        }

        $companyModel::whereAccepted(1);

        if(count( $companyFields) == 0){
            $companyFields = ['*'];
        }

        if( $id != false){
            $result = $companyModel->find($id, $companyFields);
        }
        else{
            $result = $companyModel->get($companyFields);
        }

        return Response::json($result->toArray(), 200, array
        (
            'Access-Control-Allow-Origin: *'
        ));
	}
}