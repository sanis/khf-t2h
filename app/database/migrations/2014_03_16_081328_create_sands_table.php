<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSandsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sands', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('teacher_id');
			$table->integer('subject_id');
			$table->integer('semester_id');
			$table->string('file', 255);
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
		Schema::drop('sands');
	}

}