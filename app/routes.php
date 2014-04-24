<?php

//@todo niet vergeten dat dashboard redirect naar /dashboard/login if !Auth::check()

//Route::get("dashboard", array("as" => "dashboard", "with" => "\\Admin\\Dashboard@show"));
Route::get("dashboard/login", array("as" => "dashboard.login", "uses" => "\\Admin\\Login@show"));
Route::post("dashboard/login", array("as" => "dashboard.do-login", "uses" => "\\Admin\\Login@run", "before" => "csrf"));