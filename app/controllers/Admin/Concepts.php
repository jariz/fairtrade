<?php

namespace Admin;
use Model\Company;
use Model\Concept;

/**
 * Class Concepts
 * @package Admin
 * @author Jari Zwarts
 */
class Concepts extends CrudController {

    protected function getFields() {
        $companies = array();
        $in = "";
        foreach(\Fairtrade\User::can("dashboard.companies-approve") ? Company::get() : Company::where("user_id", "=", \Auth::user()->id)->get() as $company) {
            $companies[] = [
                "id" => $company->id,
                "title" => $company->name
            ];
            $in .= $company->id.",";
        }

        $arr = array(
            "Titel" => array(
                "name" => "title",
                "type" => "text",
                "rules" => "required"
            ),
            "Inhoud" => array(
                "name" => "content",
                "type" => "wysiwyg",
                "rules" => "",
                "hideInOverview" => true
            ),
            "Bedrijf" => array(
                "name" => "company_id",
                "type" => "select",
                "rules" => "required|in:".$in,
                "options" => $companies
            ),
            "Goedgekeurd" => array(
                "name" => "accepted",
                "boolean" => true,
                "type" => "radio",
                "options" => array(
                    "Ja" => 1,
                    "Nee" => 0
                )
            ),
            "Uitgelicht" => array(
                "name" => "featured",
                "boolean" => true,
                "type" => "radio",
                "options" => array(
                    "Ja" => 1,
                    "Nee" => 0
                )
            )
        );

        if(!\Fairtrade\User::can("dashboard.concepts-approve")) {
            $arr["Goedgekeurd"]["hideInEdit"] = true;
            unset($arr["Uitgelicht"]);
        }

        return $arr;
    }

    function checkAccess($id) {
        //if user has permission to approve, they also have permission to edit the concepts of other users
        if(\Fairtrade\User::can("dashboard.concepts-approve"))
            return true;

        //trying to create records is OK
        if(is_null($id))
            return true;

        //if we're still here, look for the id
        $concept = Concept::findOrFail($id);
        if(\Auth::user()->id != $concept->user_id)
            \App::abort(403, "Access denied to this record!");
    }

    public function showEdit($id = null) {
        if($check = $this->checkHasCompanies())
            return $check;
        $this->checkAccess($id);
        return parent::showEdit($id);
    }

    public function edit()
    {
        $this->checkAccess(\Input::get("id"));
        if((\Input::has("accepted") || \Input::has("featured")) && !\Fairtrade\User::can("dashboard.concepts-approve")) {
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

    function checkHasCompanies() {
        if(!\Fairtrade\User::can("dashboard.companies-approve") && Company::where("user_id", "=", \Auth::user()->id)->count() == 0)
            return \View::make("admin.nice-error")
                ->with("title", "Conceptenbeheer fout.")
                ->with("message", "<p>U moet eerst een bedrijf aanmaken voordat u concepten kan plaatsen.</p><p><a href='".\URL::route("dashboard.companies-add")."' class='btn btn-danger'>Bedrijf toevoegen</a> </p>");
        else return false;
    }

    public function overview($filter=null, $trash=false)
    {
        if($check = $this->checkHasCompanies())
            return $check;

        if(!\Fairtrade\User::can("dashboard.concepts-approve")) {
            return parent::overview("user_id = ".\Auth::user()->id);
        } else return parent::overview();
    }

    public function approve() {
        $concept = Concept::find(\Input::get("id"));
        $concept->accepted = 1;
        $concept->save();
        return \Redirect::back();
    }

    protected $model = "\\Model\\Concept";
    protected $singular = "Concept";
    protected $plural = "Concepten";
    protected $route = "dashboard.concepts";
}