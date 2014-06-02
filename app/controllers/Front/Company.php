<?php
/**
 * Wies Kueter
 * Date: 02/05/2014
 * Time: 18:05
 * Author: Wies Kueter
 */

namespace Front;
use Model, Input, HTML, Upload, Validator, Redirect, Schema, Response, Session, Fairtrade\Map, Mail, Config, Illuminate\Mail\Message;;

class Company extends BaseController
{
    protected function registerAccount()
    {
        if( $this->checkStep(1) )
        {
            return Redirect::to('bedrijf-aanmelden/bedrijfsgegevens');
        } else{
            return \View::make("front.special.registerAccount")->with(array(
                'title' => 'Account aanmaken',
            ));
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
            'confirmation' => 'required|same:password',
        );

        $validation = Validator::make($inputs, $rules);

        if($validation->fails())
        {
            return Redirect::back()->withErrors($validation->messages())->withInput();
        } else{
            /* Loop through all fields */
            $fields = array(
                'name',
                'email',
            );

            /* Add new user to database */
            foreach($fields as $field) {
                $user->{$field} = HTML::entities(Input::get($field));
            }

            $user->role_id = 2;
            $user->password = \Hash::make(Input::get('password'));

            if($user->save()) {
                // Create session to identify this step has been done
                $session_details = array(
                    'current_step' => 1,
                    'next_step' => 2,
                    'user_id' => $user->id,
                    'company_id' => ''
                );
                Session::put('user_registration', $session_details);
                return Redirect::to('bedrijf-aanmelden/bedrijfsgegevens');
            }
        }
    }

	/**
	 * Controller to apply a new company
	 * @return void
	 */
	protected function details()
	{
        $session = Session::get('user_registration');

        if( !$this->checkStep(1) )
        {
            return Redirect::route('applyCompany');
        }
        else{
            $categories = Model\Category::lists('name', 'id');

            return \View::make("front.special.applycompany")->with(array(
                'title' => 'Bedrijf aanmelden',
                'categories' => $categories
            ));
        }
	}

	protected function add()
	{
        $session = Session::get('user_registration');
		$company = new Model\Company;
		$inputs = Input::all();

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

		if( $validation->fails() )
		{
			//return Redirect::to('bedrijf-aanmelden')->with_errors($validation->errors);
			return Redirect::back()->withErrors($validation->messages())->withInput();
		} else{
            /* Prepare all fields to add to database */
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
                $company->{$field} = HTML::entities(Input::get($field));
            }

            $company->user_id = $session['user_id'];

            // Save coordinates
            $coords = Map::convertAddress(HTML::entities(Input::get('postal_code')), HTML::entities(Input::get('address')));
            $company->lat = $coords['lat'];
            $company->lng = $coords['lng'];

            //Upload logo
            //$uploader = new \Fairtrade\Upload\Logo('logo');
            //$photoUploader = new \Fairtrade\Upload\Photo('photo');
            if($company->save())
            {
                //$company->logo = $uploader->getFilename();
                //$company->photo = $photoUploader->getFilename();

                // Set session to check on in final step
                $session_details = array(
                    'current_step' => 2,
                    'next_step' => 3,
                    'user_id' => $session['user_id'],
                    'company_id' => $company->id,
                );

                Session::put('user_registration', $session_details);

                return Redirect::route('payment');
            }
		}
	}

    /*
     * Final step of company registration process
     */
    protected function payment()
    {
        // Check if this step can be performed
        if( $this->checkStep(2) )
        {
            $session = Session::get('user_registration');

            // Mail to company who signed up
            $mail = Config::get('fairtrade.contact_email');
            $company = Model\Company::where('id', '=', $session['company_id'])->first();
            $user = Model\User::where('id', '=', $session['user_id'])->first();
            
            $category = Model\Category::where('id', '=', $company->category)->first();

            if (!is_null($category)) {
                $categoryName = 'Geen categorie';
            } else{
                $categoryName = $category->name;
            }

            \Mail::send(
                "emails.thankCompany", [
                    "company" => $company,
                    "category" => $categoryName,
                    "user" => $user
                ]
                , function(Message $message) use($mail, $user, $company) {
                    $message->to($user->email);
                    $message->subject('Bedankt voor het aanmelden van uw bedrijf');
                    $message->from($mail);
                }
            );

            // Mail to Fairtrade Amsterdam to notify the new signup
            \Mail::send(
                "emails.newApplication", [
                    "company" => $company,
                    "user" => $user
                ]
                , function(Message $message) use($mail, $user, $company) {
                    $message->to($mail);
                    $message->subject('Er is een nieuwe aanvraag');
                    $message->from($mail);
                }
            );

            // Ideal implementation
            return \View::make("front.payment")->with(array(
                'title' => 'Betalingsgegevens',
            ));
        } else{
            return Redirect::route('companyDetails');
        }
    }

    // Check what step should be visible
    protected function checkStep($step)
    {
        $session = Session::get('user_registration');

        if($step + 1 === $session['next_step'])
        {
            return true;
        } else{
            return false;
        }
    }
}