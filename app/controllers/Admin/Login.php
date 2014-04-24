<?php

namespace Admin;
use Illuminate\Support\MessageBag;

class Login extends \Controller {

    /**
     * Display the login form.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show() {
        //already logged in? send to dashboard.
        if(\Auth::check()) return \Redirect::route("dashboard");

        //display login form
        return \View::make("admin.login");
    }

    /**
     * Run the actual login.
     * @return array|\Illuminate\View\View
     */
    public function run() {
        //we only want the 2 fields we're gonna validate and use to authenticate.
        $input = \Input::only(array('email', 'password'));

        //our error bag that will hold all messages this function will produce
        $errors = new MessageBag();

        //create the validator and it's rules.
        $validator = \Validator::make($input, array(
            "email" => "required|email",
            "password" => "required"
        ));

        //does the validator pass? if yes, attempt to authenticate the user, else, add error messages to our error bag.
        if($validator->fails())
            $errors->merge($validator->errors());
        else if(!\Auth::attempt($input))
            $errors->add("authfailed", "Gebruiksgegevens zijn incorrect.");

        //are there are errors? if so, display the login form again, with the errors, respectfully.
        //else, redirect user to dashboard.
        if($errors->any())
            return \View::make("admin.login")->with("errors", $errors);
        else return array("we did it" => "yay!");
    }
} 