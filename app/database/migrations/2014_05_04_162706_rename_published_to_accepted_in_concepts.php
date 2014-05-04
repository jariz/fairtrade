<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenamePublishedToAcceptedInConcepts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table("concepts", function(Blueprint $table) {
            $table->dropColumn("published");
            $table->boolean("accepted");
            $table->integer("user_id");
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table("concepts", function(Blueprint $table) {
            $table->integer("published");
            $table->dropColumn("accepted");
            $table->dropColumn("user_id");
        });
	}

}
