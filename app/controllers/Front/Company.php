<?php
/**
 * Wies Kueter
 * Date: 01/05/2014
 * Time: 14:28
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
		$company = new Company;

		$inputs = Input::all();
		//dd($inputs);
		
		/* Convert the address to a geo location with the Googele Maps API */
		$address = str_replace(' ', '%20', Input::get('postal_code') .'%20'. Input::get('address'));
		$url = 'https://maps.googleapis.com/maps/api/geocode/json?address='. $address .'&sensor=false';
		$jsonData = file_get_contents($url);
		$data = json_decode($jsonData);

		$lat = $data->results[0]->geometry->location->lat;
		$lng = $data->results[0]->geometry->location->lng;

		$geo_location = $lat .', '. $lng;

		/* Loop through all fields */
		$fields = array(
			'name', 
			'description', 
			'url', 
			'logo', 
			'business_hours',
			'address', 
			'postal_code', 
			'city', 
			'contact_info'
		);

		foreach($fields as $field)
		{
			echo Input::get($field) .'<br />';
		}

		/* Add new company to database */
		$company->name = 'Test';
		//echo $geo_location;
		$company->save();

		/* Form validation */
		
		/* $rules = array(
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'email|required',
			'password' => 'required|min:5',
			'confirmation' => 'same:password', 
		);

		$validation = Validator::make($inputs, $rules);

		if($validation->fails())
		{
			//return Redirect::to('/')->with_errors($validation->errors);
		} else{
			// Store in database
		} */
	}
}