<?php

use Illuminate\Database\Migrations\Migration;

class CreateProbaUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('proba_users', function($table) {
    			$table->increments('id');
    			$table->string('email', 60)->unique();
    			$table->string('password', 60);
    			$table->string('first_name', 60);
    			$table->string('last_name', 60);
    			$table->string('token', 60);
    			$table->boolean('activated')->default(false);
    			$table->timestamps();
    			$table->string('key', 60);
		});
		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('proba_users');
	}

}