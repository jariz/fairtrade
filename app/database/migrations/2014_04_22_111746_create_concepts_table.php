<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConceptsTable extends Migration {

	public function up()
	{
		Schema::create('concepts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title');
			$table->text('content');
			$table->boolean('published');
			$table->boolean('featured');
			$table->timestamp('period_start')->nullable();
			$table->timestamp('period_end')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('concepts');
	}
}