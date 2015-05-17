<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class EmployeesTableSeeder extends Seeder {

	public function run()
	{

        DB::table('employees')->where('email', 'super@gmail.com')->delete();
        Employee::create(['name' => 'Fahad Ali', 'password' => Hash::make('123456'), 'email' => 'super@gmail.com',
            'gender' => 'Male', 'age' => '23', 'city' => 'Lahore', 'country' => 'Pakistan', 'address' => '10 Down Street', 'phone' => '03344050495',
            'cnic' => '1234679', 'role' => 'Super User', 'status' => 'Active', 'branch' => 'DHA', 'note' => 'MBBS Qualified']);

        DB::table('employees')->where('email', 'admin@gmail.com')->delete();
	    Employee::create(['name' => 'Shah', 'password' => Hash::make('123456'), 'email' => 'admin@gmail.com',
        'gender' => 'Male', 'age' => '23', 'city' => 'Lahore', 'country' => 'Pakistan', 'address' => '10 Down Street', 'phone' => '03344050495',
        'cnic' => '1234679', 'role' => 'Administrator', 'status' => 'Active', 'branch' => 'DHA', 'note' => 'MBBS Qualified', 'clinic_id'  => 1]);

	    DB::table('employees')->where('email', 'doctor@gmail.com')->delete();
	    Employee::create(['name' => 'Ali', 'password' => Hash::make('123456'), 'email' => 'doctor@gmail.com',
        'gender' => 'Male', 'age' => '23', 'city' => 'Lahore', 'country' => 'Pakistan', 'address' => '10 Down Street', 'phone' => '03344050495',
        'cnic' => '1234679', 'role' => 'Doctor', 'status' => 'Active', 'branch' => 'DHA', 'note' => 'MBBS Qualified', 'clinic_id'  => 1]);

	    DB::table('employees')->where('email', 'accountant@gmail.com')->delete();
	    Employee::create(['name' => 'Umer', 'password' => Hash::make('123456'), 'email' => 'accountant@gmail.com',
        'gender' => 'Male', 'age' => '23', 'city' => 'Lahore', 'country' => 'Pakistan', 'address' => '10 Down Street', 'phone' => '03344050495',
        'cnic' => '1234679', 'role' => 'Accountant', 'status' => 'Active', 'branch' => 'DHA', 'note' => 'MBBS Qualified', 'clinic_id'  => 1]);

	    DB::table('employees')->where('email', 'receptionist@gmail.com')->delete();
	    Employee::create(['name' => 'Talal', 'password' => Hash::make('123456'), 'email' => 'receptionist@gmail.com',
        'gender' => 'Male', 'age' => '23', 'city' => 'Lahore', 'country' => 'Pakistan', 'address' => '10 Down Street', 'phone' => '03344050495',
        'cnic' => '1234679', 'role' => 'Receptionist', 'status' => 'Active', 'branch' => 'DHA', 'note' => 'MBBS Qualified', 'clinic_id'  => 1]);

	    DB::table('employees')->where('email', 'lab@gmail.com')->delete();
	    Employee::create(['name' => 'Aqeel', 'password' => Hash::make('123456'), 'email' => 'lab@gmail.com',
        'gender' => 'Male', 'age' => '23', 'city' => 'Lahore', 'country' => 'Pakistan', 'address' => '10 Down Street', 'phone' => '03344050495',
        'cnic' => '1234679', 'role' => 'Lab Manager', 'status' => 'Active', 'branch' => 'DHA', 'note' => 'MBBS Qualified', 'clinic_id'  => 1]);

    }

}