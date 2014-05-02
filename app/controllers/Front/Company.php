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
use Validator;
use Redirect;

class Company extends \Controller {

	/**
	 * Controller to apply a new company
	 *
	 * @return void
	 */
	protected function apply()
	{
		return \View::make("front.applycompany")->with(array(
			'title' => 'Bedrijf aanmelden',
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

		if(isset($data->results[0]->geometry->location)) {
			$lat = $data->results[0]->geometry->location->lat;
			$lng = $data->results[0]->geometry->location->lng;
			$geo_location = $lat .', '. $lng;
		}

		/* Loop through all fields */
		$fields = array(
			'name', 
			'description', 
			'url', 
			'business_hours',
			'address', 
			'postal_code', 
			'city', 
			'contact_info'
		);

		/* Add new company to database */
		foreach($fields as $field)
		{
			$company->{$field} = Input::get($field);
		}

		$company->geo_location = $geo_location;
		$company->save();

		/* Form validation */
		$rules = array(
			//'first_name' => 'required',
			//'last_name' => 'required',
			//'email' => 'email|required',
			//'password' => 'required|min:5',
			'confirmation' => 'same:password', 
		);

		$validation = Validator::make($inputs, $rules);

		if($validation->fails())
		{
			//return Redirect::to('bedrijf-aanmelden')->with_errors($validation->errors);
			return Redirect::back()->withErrors($validation->messages())->withInput();
		} else{
			// Store in database
		}
	}
}