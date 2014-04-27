<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditPagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pages', function(Blueprint $table){
			$table->boolean('special')->default(0);
			$table->string('view', 255)->nullable();
			$table->string('heading', 255)->nullable();
			$table->string('menu_title')->nullable();
			$table->integer('order')->default(0);
			$table->integer('parent')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pages', function(Blueprint $table){
			$table->dropColumn('special');
			$table->dropColumn('view');
			$table->dropColumn('heading');
			$table->dropColumn('menu_title');
			$table->dropColumn('order');
			$table->dropColumn('parent');
		});
	}

}
