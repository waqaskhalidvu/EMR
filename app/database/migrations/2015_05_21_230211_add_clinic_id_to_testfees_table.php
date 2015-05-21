<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClinicIdToTestfeesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('testfees', function(Blueprint $table)
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
		Schema::table('testfees', function(Blueprint $table)
		{
            $table->dropForeign('testfees_clinic_id_foreign');
            $table->dropColumn('clinic_id');
		});
	}

}
