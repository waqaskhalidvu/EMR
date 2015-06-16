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
			$table->string('height');
			$table->integer('bp_systolic');
			$table->integer('bp_diastolic');
			$table->string('blood_group');
			$table->string('pulse_rate');
			$table->string('respiration_rate');
			$table->integer('temprature');
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
