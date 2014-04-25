<?php
Route::get("dashboard", array("as" => "dashboard", "uses" => "\\Admin\\Dashboard@show"));
Route::get("dashboard/login", array("as" => "dashboard.login", "uses" => "\\Admin\\Login@show"));
Route::post("dashboard/login", array("as" => "dashboard.do-login", "uses" => "\\Admin\\Login@run", "before" => "csrf"));

Route::get("dashboard/users", array("as" => "dashboard.users", "uses" => "\\Admin\\Users@overview"));
Route::get("dashboard/users/add", array("as" => "dashboard.users-add", "uses" => "\\Admin\\Users@showEdit"));
Route::get("dashboard/users/edit/{id}", array("as" => "dashboard.users-edit", "uses" => "\\Admin\\Users@showEdit"));
Route::post("dashboard/users/delete", array("as" => "dashboard.users-delete", "uses" => "\\Admin\\Users@delete"));
Route::post("dashboard/users/edit", array("as" => "dashboard.users-doedit", "uses" => "\\Admin\\Users@edit"));