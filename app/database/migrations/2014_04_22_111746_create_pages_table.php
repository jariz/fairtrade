<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration {

	public function up()
	{
		Schema::create('pages', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('title');
			$table->string('slug');
			$table->text('content');
			$table->boolean('published');
			$table->string('seo_description')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('pages');
	}
}