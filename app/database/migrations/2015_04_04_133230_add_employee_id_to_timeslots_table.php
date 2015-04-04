<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmployeeIdToTimeslotsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('timeslots', function(Blueprint $table)
		{
			$table->integer('employee_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('timeslots', function(Blueprint $table)
		{
            $table->dropColumn('employee_id');
		});
	}

}
