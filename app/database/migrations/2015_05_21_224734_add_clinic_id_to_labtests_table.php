<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClinicIdToLabtestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('labtests', function(Blueprint $table)
		{
            $table->integer('clinic_id')->unsigned()->nullable();
            $table->foreign('clinic_id')
                ->references('id')->on('clinics')
                ->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('labtests', function(Blueprint $table)
		{
            $table->dropForeign('labtests_clinic_id_foreign');
            $table->dropColumn('clinic_id');
		});
	}

}
