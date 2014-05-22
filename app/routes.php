<?php
/**
 * ADMIN
 */
Route::get("dashboard", array("as" => "dashboard", "uses" => "\\Admin\\Dashboard@show"));
Route::get("dashboard/login", array("as" => "dashboard.login", "uses" => "\\Admin\\Login@show"));
Route::get("dashboard/forgot/{code}/{id}", array("as" => "dashboard.forgot", "uses" => "\\Admin\\Login@forgot"));
Route::post("dashboard/login", array("as" => "dashboard.do-login", "uses" => "\\Admin\\Login@run", "before" => "csrf"));
Route::get("dashboard/logout/{csrf}", array("as" => "dashboard.logout", "uses" => "\\Admin\\Login@destroy"));
Route::post("dashboard/forgot", array("as" => "dashboard.do-forgot", "uses" => "\\Admin\\Login@doForgot", "before" => "csrf"));
Route::post("dashboard/changepwd", array("as" => "dashboard-changepwd", "uses" => "\\Admin\\Login@changePassword", "before" => "csrf"));
Route::get("dashboard/login", array("as" => "dashboard.login", "uses" => "\\Admin\\Login@show"));
Route::get("dashboard/settings", array("as" => "dashboard.settings", "uses" => "\\Admin\\Settings@show"));
Route::post("dashboard/settings", array("as" => "dashboard.do-settings", "uses" => "\\Admin\\Settings@run", "before" => "csrf"));

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

Route::post("dashboard/companies/approve", array("as" => "dashboard.companies-approve", "uses" => "\\Admin\\Companies@approve", "before" => "haspermission"));
Route::post("dashboard/concepts/approve", array("as" => "dashboard.concepts-approve", "uses" => "\\Admin\\Concepts@approve", "before" => "haspermission"));
Route::get("dashboard/pages/reorder",["as" => "dashboard.pages-reorder", "uses" => "\\Admin\\Pages@reorder"]);
Route::post("dashboard/pages/reorder",["as" => "dashboard.pages-post-reorder", "uses" => "\\Admin\\Pages@saveOrder"]);

/**
 * FRONT
 */
Route::get("waartekoop", array("as" => "wheretobuy", "uses" => "\\Front\\WhereToBuy@show"));
Route::get("waartekoop/bedrijf/{id?}/{bedrijf?}", array("as" => "companydetail", "uses" => "\\Front\\WhereToBuy@detail"));
Route::get("waartekoop/categorie/{id?}/{name?}", array("as" => "wheretobuy.category", "uses" => "\\Front\\WhereToBuy@show"));
Route::get("bedrijf-aanmelden", array("as" => "applyCompany", "uses" => "\\Front\\Company@registerAccount"));
Route::get("bedrijf-aanmelden/bedrijfsgegevens", array("as" => "applyCompany", "uses" => "\\Front\\Company@details"));
Route::get("bedrijf-aanmelden/betalen", array("as" => "applyCompany", "uses" => "\\Front\\Company@payment"));

/* Nieuws detail page */
Route::get('nieuws/{id}/{title?}', ['as' => 'news-item', 'uses' => "\\Front\\NewsController@show"]);
Route::get('evenement/{id}/{title?}', ['as' => 'event-item', 'uses' => "\\Front\\EventController@show"]);
Route::get('concept/{id}/{title?}', ['as' => 'concept-item', 'uses' => "\\Front\\ConceptController@show"]);

Route::post('contact', ['as' => 'contact', 'uses' => "Front\\Contact@validate"]);
Route::post("add", "\\Front\\Company@add");
Route::post("registerUser", "\\Front\\Company@registerUser");
Route::get('api/categories', function(){
    //return Model\Company::with('categories')->find(1)->toJson();
    //return Model\Company::where('category', '=', Input::get('id'))->get();
   return $companies = Model\Company::where('category', '=', Input::get('id'))->get();
});
Route::get("api/companies", "\\Front\\Company@AjaxGetCompanies");
Route::get("{slug?}/{param1?}/{param2?}", ['as' => 'dynamic-page', 'uses' => 'Front\DynamicPage@get']);
//Route::get("api/categories", "\\Front\\Category@AjaxGetCategories");
Route::get("{slug?}", ['as' => 'dynamic-page', 'uses' => 'Front\DynamicPage@get']);