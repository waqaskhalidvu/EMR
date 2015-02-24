<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFamilyhistoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('familyhistories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('f_member_name');
			$table->string('patient_relation');
			$table->string('gender');
			$table->integer('age');
			$table->text('diesease_note');
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
		Schema::drop('familyhistories');
	}

}
