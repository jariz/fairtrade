<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration {

	public function up()
	{
		Schema::create('companies', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->text('description')->nullable();
			$table->string('url')->nullable();
			$table->integer('user_id')->unsigned();
			$table->string('logo')->nullable();
			$table->text('adres')->nullable();
			$table->text('business_hours')->nullable();
			$table->text('geo_location')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('companies');
	}
}