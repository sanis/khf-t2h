<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeachersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teachers', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->nullable();
			$table->integer('department_id');
			$table->string('first_name', 255);
			$table->string('last_name', 255);
			$table->string('degree', 45)->nullable();
			$table->string('phone', 45)->nullable();
			$table->string('email', 45)->nullable();
			$table->text('about')->nullable();
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
		Schema::drop('teachers');
	}

}
