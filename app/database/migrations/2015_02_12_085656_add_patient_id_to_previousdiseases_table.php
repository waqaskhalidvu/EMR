<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPatientIdToPreviousdiseasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('previousdiseases', function(Blueprint $table)
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
		Schema::table('previousdiseases', function(Blueprint $table)
		{
            $table->dropColumn('patient_id');
		});
	}

}
