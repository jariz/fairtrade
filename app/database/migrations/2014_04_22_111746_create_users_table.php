<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('email');
			$table->string('password');
			$table->string('name');
			$table->boolean('admin');
			$table->string('ip');
			$table->string('reset_code');
			$table->string('remember_token')->nullable();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}