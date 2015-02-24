<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSurgicalhistoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('surgicalhistories', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('surgery_name');
			$table->date('surgery_date');
			$table->text('surgery_notes');
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
		Schema::drop('surgicalhistories');
	}

}
