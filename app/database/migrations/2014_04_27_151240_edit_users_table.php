<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table){
			$table->dropColumn('admin');

			$table->integer('role_id');
			$table->timestamp('subscription_start')->nullable();
			$table->timestamp('subscription_end')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table){
			$table->boolean('admin');

			$table->dropColumn('role_id');
			$table->dropColumn('subscription_start');
			$table->dropColumn('subscription_end');
		});
	}

}
