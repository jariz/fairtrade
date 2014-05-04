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
Route::get("waartekoop", array("as" => "wheretobuy", "uses" => "\\Front\\wheretobuy@show"));
Route::get("bedrijf-aanmelden", array("as" => "applyCompany", "uses" => "\\Front\\Company@apply"));
Route::post("add", "\\Front\\Company@add");
Route::get("ajaxGetCompanies", "\\Front\\Company@AjaxGetCompanies");

$crudControllers = Config::get("fairtrade.crud");

foreach($crudControllers as $route => $controller) {
    Route::get("dashboard/{$route}", array("as" => "dashboard.{$route}", "uses" => "{$controller}@overview", "before"=>"haspermission"));
    Route::get("dashboard/{$route}/add", array("as" => "dashboard.{$route}-add", "uses" => "{$controller}@showEdit", "before"=>"haspermission"));
    Route::get("dashboard/{$route}/edit/{id}", array("as" => "dashboard.{$route}-edit", "uses" => "{$controller}@showEdit", "before"=>"haspermission"));
    Route::post("dashboard/{$route}/delete", array("as" => "dashboard.{$route}-delete", "uses" => "{$controller}@delete", "before"=>"haspermission"));
    Route::post("dashboard/{$route}/edit", array("as" => "dashboard.{$route}-doedit", "uses" => "{$controller}@edit", "before"=>"haspermission"));
}


/** -- FRONT END Pagina's **/
Route::get("{slug?}", ['as' => 'dynamic-page', 'uses' => 'Front\DynamicPage@get']);
