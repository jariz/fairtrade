<?php
/**
 * Wies Kueter
 * Date: 02/05/2014
 * Time: 18:05
 * Author: Wies Kueter
 */

namespace Front;
use Model, Input, Upload, Validator, Redirect, Schema, Response, Session, Fairtrade\Map;

class Company extends BaseController
{
    protected function registerAccount()
    {
        if( Session::get('user_registration') != '' )
        {
            return Redirect::to('bedrijf-aanmelden/bedrijfsgegevens');
        }

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

        if( !Session::get('user_registration'))
        {
            return Redirect::to('bedrijf-aanmelden');
        } else{
            return \View::make("front.special.applycompany")->with(array(
                'title' => 'Bedrijf aanmelden',
                'categories' => $categories
            ));
        }
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

            $company->user_id = Session::get('user_registration');

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
                Session::put('user_registration', $user->id);
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
}