<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLecturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lectures', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('subject_id');
			$table->integer('lecture_room_id');
			$table->integer('teacher_id');
			$table->integer('semester_id');
			$table->time('start_time');
			$table->time('end_time');
			$table->string('week');
			$table->string('type');
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
		Schema::drop('lectures');
	}

}
