<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('email', 255);
			$table->string('password', 255);
			$table->text('permissions')->nullable();
			$table->boolean('activated');
			$table->string('activation_code', 255);
			$table->datetime('activated_at');
			$table->datetime('last_login');
			$table->string('persist_code', 255);
			$table->string('reset_password_code', 255);
			$table->string('first_name', 255);
			$table->string('last_name', 255);
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
		Schema::drop('users');
	}

}
