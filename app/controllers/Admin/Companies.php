<?php

namespace Admin;
use Model\Category;
use Model\Company;

/**
 * Class Companies
 * @package Admin
 * @author Jari Zwarts
 */
class Companies extends CrudController {
    protected function getFields() {

        $categories = [];
        foreach( Category::orderBy('name')->get() as $category){
            $categories[] = ['id' => $category->id, 'title' => $category->name];
        }

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
            "Adres" => array(
                "name" => "address",
                "type" => "text"
            ),
            "Postcode" => array(
                "name" => "postal_code",
                "type" => "text"
            ),
            "Stad" => array(
                "name" => "city",
                "type" => "text"
            ),
            "Contact informatie" => array(
                "name" => "contact_info",
                "type" => "textarea",
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
                "rules" => "",
                "uploader" => "Logo",
                "required" => true,
                "thumbnail" => [
                    'width' => 150,
                    'height' => 150
                ]
            ),

            "Foto Onderneming" =>[
                "name" => "photo",
                "type" => "file",
                "hideInOverview" => true,
                "uploader" => "Company",
                "required" => false,
                "thumbnail" => [
                    'width' => 600,
                    'height' => 200
                ]
            ],

            "Goedgekeurd" => array(
                "name" => "accepted",
                "boolean" => true,
                "type" => "radio",
                "options" => array(
                    "Ja" => 1,
                    "Nee" => 0
                )
            ),

            'Categorie' => [
                'name' => 'category',
                'type' => 'select',
                'options' => $categories,
                'property' => 'name'

            ]
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

    public function overview($filter=null, $trash=false, $view=false)
    {
        if(!\Fairtrade\User::can("dashboard.companies-approve")) {
            return parent::overview("user_id = ".\Auth::user()->id);
        } else return parent::overview($filter, $trash, $view);
    }

    public function approve() {
        $company = Company::find(\Input::get("id"));
        $company->accepted = 1;
        $company->save();
        return \Redirect::back();
    }


    protected $model = "\\Model\\Company";
    protected $upload = "\\Fairtrade\\Upload\\Logo";
    protected $with = 'linkedCategory';
    protected $singular = "Bedrijf";
    protected $plural = "Bedrijven";
    protected $route = "dashboard.companies";
    protected $orderBy = ['created_at', 'DESC'];
}