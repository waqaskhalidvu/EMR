<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePatientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('patients', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->date('dob');
			$table->string('gender');
			$table->integer('age');
			$table->string('email');
			$table->string('city');
			$table->string('country');
			$table->string('address');
			$table->string('phone');
			$table->string('cnic');
			$table->text('note');
            $table->string('patient_id');
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
		Schema::drop('patients');
	}

}
