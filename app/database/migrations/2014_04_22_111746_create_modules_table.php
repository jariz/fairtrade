<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModulesTable extends Migration {

	public function up()
	{
		Schema::create('modules', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('alias');
			$table->text('data');
		});
	}

	public function down()
	{
		Schema::drop('modules');
	}
}