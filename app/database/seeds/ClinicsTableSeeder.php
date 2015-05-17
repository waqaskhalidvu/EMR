<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ClinicsTableSeeder extends Seeder {

	public function run()
	{
		Clinic::where('id', 1)->delete();
        Clinic::create([
            'id' => '1',
            'name' => 'EMR Clinic',
            'address' => 'DHA Lahore'
        ]);

	}

}