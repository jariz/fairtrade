<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NewsVarcharToText extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table("news", function(Blueprint $blueprint) {
            $blueprint->dropColumn("content");
        });
        Schema::table("news", function(Blueprint $blueprint) {
            $blueprint->text("content");
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table("news", function(Blueprint $blueprint) {
            $blueprint->dropColumn("content");
        });
        Schema::table("news", function(Blueprint $blueprint) {
            $blueprint->string("content");
        });
	}

}
