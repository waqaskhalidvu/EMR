<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPatientIdToSurgicalhistoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('surgicalhistories', function(Blueprint $table)
		{
            $table->string('patient_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('surgicalhistories', function(Blueprint $table)
		{
            $table->dropColumn('patient_id');
		});
	}

}
