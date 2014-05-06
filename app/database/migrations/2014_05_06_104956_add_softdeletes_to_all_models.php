<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftdeletesToAllModels extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        $this->doIt(function(Blueprint $table) {
            $table->softDeletes();
        });
	}

    function doIt($callback) {
        Schema::table("users", $callback);
        Schema::table("news", $callback);
        Schema::table("events", $callback);
        Schema::table("concepts", $callback);
        Schema::table("pages", $callback);
        Schema::table("companies", $callback);
    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        $this->doIt(function(Blueprint $table) {
            $table->dropSoftDeletes();
        });
	}

}
