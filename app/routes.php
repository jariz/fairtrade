<?php
Route::get('test', function(){

});
//Admin
Route::get("dashboard", array("as" => "dashboard", "uses" => "\\Admin\\Dashboard@show"));
Route::get("dashboard/login", array("as" => "dashboard.login", "uses" => "\\Admin\\Login@show"));
Route::post("dashboard/login", array("as" => "dashboard.do-login", "uses" => "\\Admin\\Login@run", "before" => "csrf"));
Route::get("dashboard/logout/{csrf}", array("as" => "dashboard.logout", "uses" => "\\Admin\\Login@destroy"));
Route::get("dashboard/settings", array("as" => "dashboard.settings", "uses" => "\\Admin\\Settings@show"));
Route::post("dashboard/settings", array("as" => "dashboard.do-settings", "uses" => "\\Admin\\Settings@run", "before" => "csrf"));

//Front
Route::get("waartekoop", array("as" => "wheretobuy", "uses" => "\\Front\\WhereToBuy@show"));
Route::get("bedrijf-aanmelden/", array("as" => "applyCompany", "uses" => "\\Front\\Company@registerAccount"));
Route::get("bedrijf-aanmelden/bedrijfsgegevens", array("as" => "applyCompany", "uses" => "\\Front\\Company@details"));
Route::get("bedrijf-aanmelden/bedrijfsgegevens", array("as" => "applyCompany", "uses" => "\\Front\\Company@payment"));

Route::post("add", "\\Front\\Company@add");
Route::get("api/getcompanyjari", "\\Front\\Company@AjaxGetCompanies");

//standard crud procedures
$crudControllers = Config::get("fairtrade.crud");
foreach($crudControllers as $route => $controller) {
    Route::get("dashboard/{$route}", array("as" => "dashboard.{$route}", "uses" => "{$controller}@overview", "before"=>"haspermission"));
    Route::get("dashboard/{$route}/add", array("as" => "dashboard.{$route}-add", "uses" => "{$controller}@showEdit", "before"=>"haspermission"));
    Route::get("dashboard/{$route}/edit/{id}", array("as" => "dashboard.{$route}-edit", "uses" => "{$controller}@showEdit", "before"=>"haspermission"));
    Route::post("dashboard/{$route}/delete", array("as" => "dashboard.{$route}-delete", "uses" => "{$controller}@delete", "before"=>"haspermission"));
    Route::post("dashboard/{$route}/edit", array("as" => "dashboard.{$route}-doedit", "uses" => "{$controller}@edit", "before"=>"haspermission"));
    Route::post("dashboard/{$route}/restore", array("as" => "dashboard.{$route}-dorestore", "uses" => "{$controller}@restore", "before"=>"haspermission"));
    Route::get("dashboard/{$route}/trash", array("as" => "dashboard.{$route}-trash", "uses" => "{$controller}@trash", "before"=>"haspermission"));

}

//custom crud routes
Route::post("dashboard/companies/approve", array("as" => "dashboard.companies-approve", "uses" => "\\Admin\\Companies@approve", "before" => "haspermission"));
Route::post("dashboard/concepts/approve", array("as" => "dashboard.concepts-approve", "uses" => "\\Admin\\Concepts@approve", "before" => "haspermission"));
Route::get("dashboard/pages/reorder",["as" => "dashboard.pages-reorder", "uses" => "\\Admin\\Pages@reorder"]);
Route::post("dashboard/pages/reorder",["as" => "dashboard.pages-post-reorder", "uses" => "\\Admin\\Pages@saveOrder"]);

/** -- FRONT END Pagina's **/
Route::get("{slug?}", ['as' => 'dynamic-page', 'uses' => 'Front\DynamicPage@get']);
