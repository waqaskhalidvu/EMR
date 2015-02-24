<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLabtestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('labtests', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('test_name');
			$table->text('test_description');
			$table->double('total_fee');
			$table->integer('patient_id');
			$table->integer('appointment_id');
			$table->text('test_results');
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
		Schema::drop('labtests');
	}

}
