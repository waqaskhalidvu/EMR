<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropFieldsFromVitalSignsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vitalsigns', function(Blueprint $table)
		{
			$table->dropColumn('weight_unit');
            $table->dropColumn('height_unit');
            $table->dropColumn('bp_systolic_unit');
            $table->dropColumn('bp_diastolic_unit');
            $table->dropColumn('pulse_rate_unit');
            $table->dropColumn('respiration_rate_unit');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vitalsigns', function(Blueprint $table)
		{
            $table->string('weight_unit');
            $table->string('height_unit');
            $table->string('bp_systolic_unit');
            $table->string('bp_diastolic_unit');
            $table->string('pulse_rate_unit');
            $table->string('respiration_rate_unit');
		});
	}

}
