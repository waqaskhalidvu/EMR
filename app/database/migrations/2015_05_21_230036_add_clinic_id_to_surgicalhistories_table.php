<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddClinicIdToSurgicalhistoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('surgicalhistories', function(Blueprint $table)
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
		Schema::table('surgicalhistories', function(Blueprint $table)
		{
            $table->dropForeign('surgicalhistories_clinic_id_foreign');
            $table->dropColumn('clinic_id');
		});
	}

}
