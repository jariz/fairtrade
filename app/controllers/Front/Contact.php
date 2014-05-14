<?php
namespace Front;
use Illuminate\Mail\Message;
use Input, Validator, Redirect, Config;

class Contact extends BaseController{


    public function validate(){

        $input = Input::only(['name', 'subject', 'email', 'message']);

        $rules = [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required|min:3|max:150',
            'message' => 'required|min:3'
        ];

        $validation = Validator::make($input, $rules);

        if( $validation->fails() ){
            return Redirect::back()->withErrors($validation)->withInput();
        }

        $mail = Config::get('fairtrade.contact_email');

// TODO mail fixen
//        \Mail::send(
//            "emails.contact", [
//
//
//                "m" => $input['message']
//            ]
//            , function(Message $message) use($mail, $input) {
//                $message->to($mail);
//                $message->subject($input['subject']);
//                $message->from("contact@fairtradegemeenten.nl");
//            });

        return Redirect::back()->with([
                'success' => 'Uw bericht is successvol verzonden.'
        ]);
    }

}