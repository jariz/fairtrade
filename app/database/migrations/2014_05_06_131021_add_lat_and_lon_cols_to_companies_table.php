<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLatAndLonColsToCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('companies', function($table){
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->dropColumn('geo_location');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('companies', function($table){
            $table->dropColumn('lat');
            $table->dropColumn('lng');
            $table->text('geo_location')->nullable();
        });
	}
}