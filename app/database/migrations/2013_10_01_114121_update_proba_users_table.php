<?php

use Illuminate\Database\Migrations\Migration;

class UpdateProbaUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('proba_users', function($table)
			{
    			$table->unique('token');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}