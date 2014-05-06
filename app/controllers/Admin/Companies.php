<?php

namespace Admin;
use Model\Company;

/**
 * Class Companies
 * @package Admin
 * @author Jari Zwarts
 */
class Companies extends CrudController {
    protected function getFields() {
        $arr = array(
            "Naam" => array(
                "name" => "name",
                "type" => "text",
                "rules" => "required"
            ),
            "Beschrijving" => array(
                "name" => "description",
                "type" => "wysiwyg",
                "rules" => "",
                "hideInOverview" => true
            ),
            "Openingstijden" => array(
                "name" => "business_hours",
                "hideInOverview" => true,
                "type" => "textarea",
                "rules" => ""
            ),
            "Website" => array(
                "name" => "url",
                "type" => "text",
                "rules" => "url",
            ),
            "Logo" => array(
                "name" => "logo",
                "type" => "file",
                "hideInOverview" => true,
                "rules" => ""
            ),
            "Goedgekeurd" => array(
                "name" => "accepted",
                "boolean" => true,
                "type" => "radio",
                "options" => array(
                    "Ja" => 1,
                    "Nee" => 0
                )
            )
        );

        if(!\Fairtrade\User::can("dashboard.companies-approve")) {
            $arr["Goedgekeurd"]["hideInEdit"] = true;
        }

        return $arr;
    }

    function checkAccess($id) {
        //if user has permission to approve, they also have permission to edit the companies of other users
        if(\Fairtrade\User::can("dashboard.companies-approve"))
            return true;

        //trying to create records is OK
        if(is_null($id))
            return true;

        //if we're still here, look for the id
        $company = Company::findOrFail($id);
        if(\Auth::user()->id != $company->user_id)
            \App::abort(403, "Access denied to this record!");
    }

    public function showEdit($id = null) {
        $this->checkAccess($id);
        return parent::showEdit($id);
    }

    public function edit()
    {
        $this->checkAccess(\Input::get("id"));
        if(\Input::has("accepted") && !\Fairtrade\User::can("dashboard.companies-approve")) {
            //hack attempt!
            \Log::warning("Possible hacking attempt from user ".\Auth::user()->id." (".\Request::getClientIp().")");
            \App::abort(403, "Hack attempt prevented and logged.");
        }
        return parent::edit();
    }

    public function delete()
    {
        $this->checkAccess(\Input::get("id"));
        return parent::delete();
    }

    public function overview($filter=null, $trash=false)
    {
        if(!\Fairtrade\User::can("dashboard.companies-approve")) {
            return parent::overview("user_id = ".\Auth::user()->id);
        } else return parent::overview();
    }

    public function approve() {
        $company = Company::find(\Input::get("id"));
        $company->accepted = 1;
        $company->save();
        return \Redirect::back();
    }


    protected $model = "\\Model\\Company";
    protected $upload = "\\Fairtrade\\Upload\\Logo";
    protected $singular = "Bedrijf";
    protected $plural = "Bedrijven";
    protected $route = "dashboard.companies";
}