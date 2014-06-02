<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('logs', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user');
            $table->integer('level');
            $table->text('get');
            $table->text('post');
            $table->text('request');
            $table->text('server');
            $table->text('cookie');
            $table->text('session');
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
		Schema::drop('logs');
	}

}
