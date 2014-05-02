<?php
Route::get('test', function(){

});
//Admin
Route::get("dashboard", array("as" => "dashboard", "uses" => "\\Admin\\Dashboard@show"));
Route::get("dashboard/login", array("as" => "dashboard.login", "uses" => "\\Admin\\Login@show"));
Route::post("dashboard/login", array("as" => "dashboard.do-login", "uses" => "\\Admin\\Login@run", "before" => "csrf"));
Route::get("dashboard/logout/{csrf}", array("as" => "dashboard.logout", "uses" => "\\Admin\\Login@destroy"));
Route::get("dashboard/settings", array("as" => "dashboard.settings", "uses" => "\\Admin\\Settings@show"));

//Front
Route::get("waartekoop", array("as" => "wheretobuy", "uses" => "\\Front\\wheretobuy@show"));
Route::get("bedrijf-aanmelden", array("as" => "applyCompany", "uses" => "\\Front\\Company@apply"));


// Post requests
//Route::post('add', '\\Front\\company@add');

$crudControllers = array(
    "users" => "\\Admin\\Users",
    "news" => "\\Admin\\News",
    "events" => "\\Admin\\Events",
    "concepts" => "\\Admin\\Concepts",
    "pages" => "\\Admin\\Pages"

);

foreach($crudControllers as $route => $controller) {
    Route::get("dashboard/{$route}", array("as" => "dashboard.{$route}", "uses" => "{$controller}@overview"));
    Route::get("dashboard/{$route}/add", array("as" => "dashboard.{$route}-add", "uses" => "{$controller}@showEdit"));
    Route::get("dashboard/{$route}/edit/{id}", array("as" => "dashboard.{$route}-edit", "uses" => "{$controller}@showEdit"));
    Route::post("dashboard/{$route}/delete", array("as" => "dashboard.{$route}-delete", "uses" => "{$controller}@delete"));
    Route::post("dashboard/{$route}/edit", array("as" => "dashboard.{$route}-doedit", "uses" => "{$controller}@edit"));
}


/** -- FRONT END Pagina's **/
Route::get("{slug?}", ['as' => 'dynamic-page', 'uses' => 'Front\DynamicPage@get']);
