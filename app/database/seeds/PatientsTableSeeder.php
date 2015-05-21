<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PatientsTableSeeder extends Seeder {

	public function run()
	{
        Patient::where('patient_id', 'P01')->delete();

        Patient::create(['name' => 'Ahmed Raza', 'dob' => date('Y-m-d', strtotime('-25 years')), 'gender' => 'Male',
        'age' => 25, 'email' => 'bc110201815@vu.edu.pk', 'city' => 'Lahore', 'country' => 'Pakistan',
        'address' => 'DHA', 'phone' => '(0092) 334-4050495', 'cnic' => '12345-1234567-8', 'note' => 'Care the patient well.',
        'patient_id' => 'P01', 'clinic_id' => 1]);
	}

}