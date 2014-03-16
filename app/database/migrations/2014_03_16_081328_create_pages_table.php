<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id');
			$table->integer('parent_id')->nullable();
			$table->string('title', 255);
			$table->string('slug', 255);
			$table->text('content')->nullable();
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
		Schema::drop('pages');
	}

}
