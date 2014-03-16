<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('menu', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('page_id')->nullable();
			$table->integer('parent_id')->nullable();
			$table->string('title', 255);
			$table->string('alt', 500);
			$table->string('url', 500);
			$table->string('target');
			$table->integer('lft');
			$table->integer('rgt');
			$table->integer('depth');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('menu');
	}

}
