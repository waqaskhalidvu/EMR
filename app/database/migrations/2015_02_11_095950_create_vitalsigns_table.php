<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVitalsignsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vitalsigns', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('weight');
			$table->string('weight_unit');
			$table->string('height');
			$table->string('height_unit');
			$table->integer('bp_systolic');
			$table->string('bp_systolic_unit');
			$table->integer('bp_diastolic');
			$table->string('bp_diastolic_unit');
			$table->string('blood_group');
			$table->string('pulse_rate');
			$table->string('pulse_rate_unit');
			$table->string('respiration_rate');
			$table->string('respiration_rate_unit');
			$table->integer('temprature');
			$table->string('temprature_unit');
			$table->text('note');
			$table->string('patient_id');
            $table->string('appointment_id');
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
		Schema::drop('vitalsigns');
	}

}
