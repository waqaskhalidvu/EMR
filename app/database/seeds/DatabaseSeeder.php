<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->call('ClinicsTableSeeder');
        $this->command->info('Clinics Table seeded!');

		$this->call('EmployeesTableSeeder');
        $this->command->info('Employees Table seeded!');

        $this->call('PatientsTableSeeder');
        $this->command->info('Patients Table seeded!');

	}

}
