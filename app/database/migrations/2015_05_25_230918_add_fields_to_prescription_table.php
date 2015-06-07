<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToPrescriptionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('prescriptions', function(Blueprint $table)
		{
            $table->integer('medicine1_id')->unsigned()->nullable();
            $table->foreign('medicine1_id')
                ->references('id')->on('medicines');
            $table->integer('med1_qty')->nullable();

            $table->integer('medicine2_id')->unsigned()->nullable();
            $table->foreign('medicine2_id')
                ->references('id')->on('medicines');
            $table->integer('med2_qty')->nullable();

            $table->integer('medicine3_id')->unsigned()->nullable();
            $table->foreign('medicine3_id')
                ->references('id')->on('medicines');
            $table->integer('med3_qty')->nullable();

            $table->integer('medicine4_id')->unsigned()->nullable();
            $table->foreign('medicine4_id')
                ->references('id')->on('medicines');
            $table->integer('med4_qty')->nullable();

            $table->integer('medicine5_id')->unsigned()->nullable();
            $table->foreign('medicine5_id')
                ->references('id')->on('medicines');
            $table->integer('med5_qty')->nullable();

            $table->integer('medicine6_id')->unsigned()->nullable();
            $table->foreign('medicine6_id')
                ->references('id')->on('medicines');
            $table->integer('med6_qty')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('prescriptions', function(Blueprint $table)
		{
            $table->dropForeign('prescriptions_medicine1_id_foreign');
            $table->dropColumn('medicine1_id');

            $table->dropForeign('prescriptions_medicine2_id_foreign');
            $table->dropColumn('medicine2_id');

            $table->dropForeign('prescriptions_medicine3_id_foreign');
            $table->dropColumn('medicine3_id');

            $table->dropForeign('prescriptions_medicine4_id_foreign');
            $table->dropColumn('medicine4_id');

            $table->dropForeign('prescriptions_medicine5_id_foreign');
            $table->dropColumn('medicine5_id');

            $table->dropForeign('prescriptions_medicine6_id_foreign');
            $table->dropColumn('medicine6_id');

            $table->dropColumn('med1_qty');
            $table->dropColumn('med2_qty');
            $table->dropColumn('med3_qty');
            $table->dropColumn('med4_qty');
            $table->dropColumn('med5_qty');
            $table->dropColumn('med6_qty');
		});
	}

}
