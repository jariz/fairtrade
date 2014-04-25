<?php
/**
 * JARIZ.PRO
 * Date: 24/04/2014
 * Time: 10:21
 * Author: JariZ
 */

namespace Admin;


class CrudController extends AdminController
{

    /**
     * Should be overridden by the extender.
     */
    protected function getFields()
    {
        return array();
    }

    protected $model;
    protected $plural;
    protected $singular;
    protected $route;

    /**
     * Give a overview of all entries
     */
    public function overview()
    {
        \View::share("title", $this->plural." overzicht");
        $fields_ = $this->getFields();
        $fields = array();
        foreach ($fields_ as $key => $field) {
            if (isset($field["hideInOverview"]) && $field["hideInOverview"] === true)
                continue;
            $fields[$key] = $field;
        }
        $model = $this->model;
        $data = $model::paginate(15);

        return \View::make("admin.crud.overview")
            ->with("columns", $fields)
            ->with("singular", $this->singular)
            ->with("plural", $this->plural)
            ->with("route", $this->route)
            ->with("data", $data);
    }

    /**
     * Show the edit/add form.
     * @param null $id If id is null, we're assuming you want to add a user.
     * @return \Illuminate\View\View
     */
    public function showEdit($id = null)
    {
        $editing = !is_null($id);
        $fields = $this->getFields();
        $model = $this->model;
        $keys = array();
        \View::share("title", "Pas ".strtolower($this->singular)." aan");
        foreach ($fields as $field) $keys[] = $field["name"];

        return \View::make("admin.crud.edit")
            ->with("fields", $fields)
            ->with("data", !$editing ? \Input::only($keys) : $model::findOrFail($id)->toArray())
            ->with("post_route", $this->route . "-doedit")
            ->with("id", $id);
    }

    /**
     * Do the actual adding/editing.
     */
    public function edit()
    {
        $model = $this->model;
        //get all fields in the crud
        $fields = $this->getFields();

        //determine if we're adding or editing
        $editing = \Input::has("id");

        //build the input
        $keys = array("id");
        foreach ($fields as $field) $keys[] = $field["name"];
        $input = \Input::only($keys);

        //build the rules
        $rules = array();
        foreach ($fields as $field) {
            $rules[$field["name"]] = $field["rules"];
        }
        if ($editing) {
            $m = new $model;
            $rules["id"] = "required|numeric|exists:" . $m->getTable() . ",id";
        }

        //validate the data
        $validator = \Validator::make($input, $rules);

        if ($validator->fails()) {
            \View::share("errors", $validator->errors());
            return $this->showEdit(\Input::get("id"));
        } else {

            if ($editing) $data = $model::findOrFail(\Input::get("id"));
            else $data = new $model;

            foreach ($fields as $field) {
                $name = $field["name"];

                //check for exceptions in data
                switch ($field["type"]) {
                    case "password";
                        //if password field is empty, don't change it.
                        if (empty($input[$name]))
                            continue;
                        break;
                }

                $data->$name = $input[$name];
            }
            $data->save();

            return \Redirect::to(\URL::route($this->route));
        }


    }
}