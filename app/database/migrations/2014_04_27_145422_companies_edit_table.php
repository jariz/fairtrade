<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CompaniesEditTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('companies', function(Blueprint $table){

			$table->dropColumn('adres');

			$table->boolean('accepted')->default(0);
			$table->string('address', 255)->nullable();
			$table->string('postal_code', 255)->nullable();
			$table->string('city', 255)->nullable();
			$table->text('contact_info')->nullable();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('companies', function(Blueprint $table){
			$table->dropColumn('accepted');
			$table->dropColumn('address');
			$table->dropColumn('postal_code');
			$table->dropColumn('city');
			$table->dropColumn('contact_info');

			$table->string('addres', 255)->nullable();
		});
	}

}
