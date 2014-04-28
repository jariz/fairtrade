<?php
/**
 * JARIZ.PRO
 * Date: 24/04/2014
 * Time: 10:21
 * Author: JariZ
 */

namespace Admin;
use Illuminate\Support\MessageBag;

/**
 * Class CrudController
 * Automates the Creating, Reading, Updating and Deleting of models.
 * @package Admin
 * @author Jari Zwarts
 */
class CrudController extends AdminController
{

    /**
     * MUST be overridden by the extender.
     * Should return a array with all required fields.
     * The key is the label, the value is a array with the following required keys:<br>
     * <ul>
     * <li><b>name</b>: The column in the table. (string)</li>
     * <li><b>rules</b>: The validation rules as described in the laravel validator docs. Can be an empty string, but is still required. (string)</li>
     * <li><b>type</b>: The type of field to display. (string)<br>Can be one of the following:
     * <ul>
     * <li><b>text</b>: A input with the text type</li>
     * <li><b>password</b>: A input with the password type. will be ignored unless it's filled in.</li>
     * <li><b>radio</b>: A set of radio boxes. Requires the optional key 'options' as described below.</li>
     * <li><b>wysiwyg</b>: 'What you see is what you get' HTML editor.</li>
     * <li><b>file</b>: A file input. Requires a upload class name to be set.</li>
     * <li><b>date</b>: A text field with a datepicker which allows for easy date choosing.</li>
     * </ul>
     * </ul>
     * Optional keys:
     * <ul>
     * <li><b>hideInOverview</b>: Whether to show the field on the overview page. (boolean)</li>
     * <li><b>options</b>: An array for fields with multiple values such as the radio type. The index is the value, the value is the label. (array) <br>Example: <pre>[0 => 'No', 1 => 'Yes']</pre></li>
     * <li><b>boolean</b>: Whether to show the field as a boolean in the overview. Expects the field's value to be either 0 or 1. (boolean)</li>
     * </ul>
     * @author Jari Zwarts
     */
    protected function getFields()
    {
        return array();
    }

    /**
     * The model name (for example '\\Model\\User'). Must be overridden.
     * @var string
     */
    protected $model;

    /**
     * Plural form of the CRUD entry (for example 'Users'). Must be overridden.
     * @var string
     */
    protected $plural;

    /**
     * Singular form of the CRUD entry (for example 'User'). Must be overridden.
     * @var string
     */
    protected $singular;

    /**
     * The route you assigned in routes.php (for example 'dashboard.users'). Must be overridden.
     * @var string
     */
    protected $route;

    /**
     * Whether to display the timestamps (created_formatted, updated_formatted). Doesn't need to be overridden
     * @var bool
     */
    protected $timestamps = false;

    /**
     * The name of the upload class that will handle file uploads trough the file field.
     * @var string
     */
    protected $upload = "\\Fairtrade\\Upload";

    /**
     * Give a overview of all entries
     * @author Jari Zwarts
     */
    public function overview()
    {
        \View::share("title", $this->plural." overzicht");

        //get all fields, filter out the ones that we aren't supposed to display in the overview.
        $fields_ = $this->getFields();
        $fields = array();
        foreach ($fields_ as $key => $field) {
            if (isset($field["hideInOverview"]) && $field["hideInOverview"] === true)
                continue;
            $fields[$key] = $field;
        }

        $model = $this->model;

        if(\Input::has("q")) {
            //Apparently, we're not only showing a overview, we're also searching for a certain value within one of the columns
            //So, let's build a query that filters the data.
            $data = new $model;
            /* @var $data \Eloquent */
            foreach($fields as $field) {
                //search trough all fields that are allowed to display in the overview.
                if (isset($field["hideInOverview"]) && $field["hideInOverview"] === true)
                    continue;
                $data = $data->orWhere($field["name"], "LIKE", "%".\Input::get("q")."%");
            }
            //force query to give unique results
            $data = $data->distinct()
            //get the data
                ->paginate(15);
        } else
            //display the data without any filters
            $data = $model::paginate(15);

        return \View::make("admin.crud.overview")
            ->with("columns", $fields)
            ->with("singular", $this->singular)
            ->with("plural", $this->plural)
            ->with("route", $this->route)
            ->with("data", $data)
            ->with("timestamps", $this->timestamps)
            ->with("searchQuery", \Input::get("q"));
    }

    /**
     * Show the edit/add form.
     * @param null $id If id is null, we're assuming you want to add a user.
     * @return \Illuminate\View\View
     * @author Jari Zwarts
     */
    public function showEdit($id = null)
    {
        $editing = !is_null($id);
        $fields = $this->getFields();
        $model = $this->model;
        $keys = array();

        if($editing)
            \View::share("title", "Pas ".strtolower($this->singular)." aan");
        else \View::share("title", "Maak ".strtolower($this->singular)." aan");

        foreach ($fields as $field) $keys[] = $field["name"];

        return \View::make("admin.crud.edit")
            ->with("fields", $fields)
            ->with("data", !$editing ? \Input::only($keys) : $model::findOrFail($id)->toArray())
            ->with("post_route", $this->route . "-doedit")
            ->with("id", $id);
    }

    /**
     * Do the actual adding/editing.
     * @author Jari Zwarts
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
                    case "file":
                        $upload = $this->upload;
                        $upload = new $upload($name);
                        /* @var $upload \Fairtrade\Upload\Upload */
                        $filename = \Str::random(20).".".\File::extension(\Input::get($name));
                        $upload->setFileName($filename);
                        if(!$upload->upload()) {
                            \View::share("errors", new MessageBag(array($upload->error())));
                            return $this->showEdit(\Input::get("id"));
                        } else {
                            $input[$name] = $filename;
                        }
                        break;
                }

                $data->$name = $input[$name];
            }
            $data->save();

            return \Redirect::to(\URL::route($this->route));
        }
    }

    /**
     * Delete an item. Will throw an error if the input contains a incorrect id.
     * @return \Illuminate\Http\RedirectResponse
     * @author Jari Zwarts
     */
    public function delete() {
        $model = $this->model;
        $id = intval(\Input::get("id"));
        $entry = $model::findOrFail($id);
        $entry->delete();
        return \Redirect::back();
    }
}