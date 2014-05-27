<?php
namespace Admin;
use URL;
use Model\Page;

class Pages extends CrudController {


    public function reorder(){
        return parent::overview(null, false, 'admin.crud.reorder');
    }

    protected function getFields() {


//        $data = Page::select(['id', 'title'])
//            ->get()
//            ->toArray();
//
//        array_unshift($data, ['id' => 0, "title" => 'geen']);




        return array(
            "Pagina titel" => [
                "name" => "title",
                "type" => "text",
                "rules" => "required"
            ],

            "Titel in menu" => [
                "name" => 'menu_title',
                "type" => "text",
                "rules" => "required_if:show_in_nav,1"
            ],

            "URL" => [
               "name" => "slug",
               "type" => "text-with-prepend",
                "prepend" => URL::to('/').'/',
                "rules" => "required|alpha_dash"
            ],

            "Inhoud" => [
                "name" => "content",
                "type" => "wysiwyg",
                "hide_if" => ['special' => 1],
                "rules" => "",
                "hideInOverview" => true
            ],


            "Gepubliceerd" => [
                "name" => "published",
                "type" => "checkbox",
                "rules" => "",
                "boolean" => true
            ],

            "Tonen in Menu" => [
                "name" => "show_in_nav",
                "type" => "checkbox",
                "rules" => "",
                "hideInOverview" => true
            ],

//            "Tonen onder" => [
//                "name" => "parent",
//                "type" => "select",
//                "hideInOverview" => true,
//                "options" => $data
//            ],

            "Pagina-specifieke opties" => [
                "name" => "meta",
                "type" => "json",
                "rules" => "",
                "hideInOverview" => true,
                "hide_if" => ['special' => 0]
            ],



        );
    }

    public function saveOrder() {

        $orderData = \Input::get('data');

        if( !is_array($orderData ) ) {
           return \Response::json([
                'success' => 0,
                'message' => 'data is missing'
           ]);
        }

        foreach( $orderData as $item ) {
            $page = Page::find($item['id']);


            if( !$page->exists() )
                continue;


            $page->order = $item['order'];
            $page->save();
        }

        return \Response::json(['success' => 1]);
    }

    public function delete()
    {
        $id = intval(\Input::get("id"));
        $entry = Page::findOrFail($id);
        if($entry->special) return \View::make("admin.nice-error", [
            "title" => "Kan speciale pagina niet verwijderen",
            "message" => "Dit is een systeempagina en kan daarom niet worden verwijderd."
        ]);

        return parent::delete();
    }

    protected $model = "\\Model\\Page";
    protected $singular = "Pagina";
    protected $plural = "Pagina's";
    protected $route = "dashboard.pages";
    protected $reorder = true;
    protected $parentElements = true;
    protected $timestamps = true;
    protected $orderBy = ['order', 'ASC'];
} 