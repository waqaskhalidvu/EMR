<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

///////////////////////////////// PUBLIC ROUTES ///////////////////////////////////
Route::get('/', function()
{
    Auth::logout();
	return View::make('index');
});

Route::get('/login', function(){
    Auth::logout();
    return View::make('login');
});

Route::get('/logout', array('before' => 'auth', function(){
    Auth::logout();
    return View::make('login');
}));

Route::post('contact/messages',function(){

    $data = ['text' => Input::get('message'), 'phone' => Input::get('phone'), 'name' => Input::get('name'),
            'email' => Input::get('email')];
//      Send email to employee
    $super_admin = Employee::where('role', 'Super User')->first();
    Mail::queue('emails.contact_message', $data, function($message) use($super_admin)
    {
        $message->to('emronline1@gmail.com', $super_admin->name)->subject('EMR Contact Message!');
    });

    return 'You message has been received. We will contact you back soon!';
});

Route::get('/about', 'HomeController@showAbout');

Route::get('/services', 'HomeController@showServices');

Route::get('/contacts', 'HomeController@showContacts');

Route::post('validate', 'EmployeesController@validate');

Route::controller('password', 'RemindersController');

Route::get('remind', 'RemindersController@getRemind');

/////////////////////////////////////// PRIVATE ROUTES ////////////////////////////////////////////
Route::group(array('before' => 'auth'), function(){

    ////////////////////// Super User Routes START ///////////////////////
    Route::group(array('before' => 'Super'), function(){
        Route::get('/super_home', 'HomeController@showSuper_home');

        Route::resource('employees', 'EmployeesController');

        Route::get('super_about', function(){
            return View::make('super.about');
        });
        Route::get('super_contacts', function(){
            return View::make('super.contacts');
        });
        Route::get('super_services', function(){
            return View::make('super.services');
        });

        Route::resource('clinics', 'ClinicsController');

    });
    ////////////////////// Admin Routes END ///////////////////////

    ////////////////////// Admin Routes START ///////////////////////
    Route::group(array('before' => 'Administrator'), function(){
        Route::get('/admin_home', 'HomeController@showAdmin_home');

        Route::resource('employees', 'EmployeesController');

        Route::get('admin_about', function(){
            return View::make('admin.about');
        });
        Route::get('admin_contacts', function(){
            return View::make('admin.contacts');
        });
        Route::get('admin_services', function(){
            return View::make('admin.services');
        });

        Route::post('patients/filter', function(){
            $date_range = (explode("--",Input::get('date_range')));
            if(isset($date_range[0]) && isset($date_range[1])) {
                $start = $date_range[0];
                $end = $date_range[1];
                $appointments = Appointment::where('clinic_id', Auth::user()->clinic_id)
                    ->whereBetween('date', [$start, $end])->where('status', 5)->get();

                return View::make('patients.checked_patients', compact('appointments'));
            }elseif(isset($date_range[0])){
                $appointments = Appointment::where('clinic_id', Auth::user()->clinic_id)
                    ->where('date', $date_range[0])->where('status', 5)->get();

                return View::make('patients.checked_patients', compact('appointments'));
            }
        });

        Route::get('patients_reporting', 'PatientsController@patients_reporting');

    });
    ////////////////////// Admin Routes END ///////////////////////


    ////////////////// Doctor Routes START ///////////////////
    Route::any('/doctor_home', array('before' => 'Doctor', 'uses' => 'HomeController@showDoctor_home'));

    Route::get('doctor_about', function(){
        return View::make('doctor.about');
    });
    Route::get('doctor_contacts', function(){
        return View::make('doctor.contacts');
    });
    Route::get('doctor_services', function(){
        return View::make('doctor.services');
    });
    ////////////////// Doctor Routes END ///////////////////


    /////////////////// Receptionist Routes START /////////////////
    Route::get('/receptionist_home', array('before' => 'Receptionist', 'uses' => 'HomeController@showReceptionist_home'));
    Route::get('receptionist_about', function(){
        return View::make('receptionist.about');
    });
    Route::get('receptionist_contacts', function(){
        return View::make('receptionist.contacts');
    });
    Route::get('receptionist_services', function(){
        return View::make('receptionist.services');
    });
    /////////////////// Receptionist Routes END ///////////////////


    /////////////////// LabManager Routes START ///////////////////
    Route::get('/labmanager_home', array('before' => 'Lab', 'uses' => 'HomeController@showLabmanager_home'));
    Route::get('lab_about', function(){
        return View::make('lab.about');
    });
    Route::get('lab_contacts', function(){
        return View::make('lab.contacts');
    });
    Route::get('lab_services', function(){
        return View::make('lab.services');
    });
    /////////////////// LabManager Routes END ///////////////////


    ////////////////// Accountant Routes /////////////////
    Route::get('/accountant_home', array('before' => 'Accountant', 'uses' => 'HomeController@showAccountant_home'));
    Route::get('accountant_about', function(){
        return View::make('accountant.about');
    });
    Route::get('accountant_contacts', function(){
        return View::make('accountant.contacts');
    });
    Route::get('accountant_services', function(){
        return View::make('accountant.services');
    });
    /////////////////// Accountant Routes END ///////////////////


    //****************************** Common Routes *******************************//

    Route::resource('patients', 'PatientsController');

    Route::resource('schedules', 'SchedulesController');

    Route::resource('surgicalhistories', 'SurgicalhistoriesController');

    Route::resource('familyhistories', 'FamilyhistoriesController');

    Route::resource('previousdiseases', 'PreviousdiseasesController');

    Route::resource('allergies', 'AllergiesController');

    Route::resource('drugusages', 'DrugusagesController');

    Route::resource('diagonosticprocedures', 'DiagonosticproceduresController');

    Route::resource('vitalsigns', 'VitalsignsController');

    Route::resource('labtests', 'LabtestsController');

    Route::resource('prescriptions', 'PrescriptionsController');

    Route::resource('medicines', 'MedicinesController');

    // Medical Record Routes
    Route::get('search_pmr', 'HomeController@showSearchPMR');
    Route::any('view_pmr', 'HomeController@showViewPMR');

    Route::resource('dutydays', 'DutydaysController');

    Route::resource('timeslots', 'TimeslotsController');

    Route::resource('appointments', 'AppointmentsController');

    Route::get('app_vitals', function(){
        if(Auth::user()->role == 'Administrator' || Auth::user()->role == 'Receptionist'){
            $appointments = Appointment::has('vitalsign', '=', 0)->where('clinic_id', Auth::user()->clinic_id)->paginate(10);
        }elseif(Auth::user()->role == 'Doctor'){
            $appointments = Appointment::has('vitalsign')->where('employee_id', Auth::id())->paginate(10);
        }
        $flag = "vitals";
        return View::make('appointment_based_data.appointments', compact('appointments', 'flag'));
    });

    Route::get('app_prescription', function(){
        $appointments = Appointment::has('prescription', '=', 0)->where('clinic_id', Auth::user()->clinic_id)->paginate(10);
        $flag = "prescription";
        return View::make('appointment_based_data.appointments', compact('appointments', 'flag'));
    });

    Route::get('app_tests', function(){
        if(Input::get('id') !== null){
            $appointments = Appointment::where('patient_id', Input::get('id'))->paginate(10);
        }else{
            $appointments = Appointment::where('clinic_id', Auth::user()->clinic_id)->paginate(10);
        }
        $flag = "test";
        return View::make('appointment_based_data.appointments', compact('appointments', 'flag'));
    });

    Route::get('app_proc', function(){
        $appointments = Appointment::has('diagonosticprocedure', '=', 0)->where('clinic_id', Auth::user()->clinic_id)->get();
        $flag = "proc";
        return View::make('appointment_based_data.appointments', compact('appointments', 'flag'));
    });

    Route::get('app_check_fee', function(){
        if(Auth::user()->role == "Accountant"){
            $appointments = Appointment::where('clinic_id', Auth::user()->clinic_id)->paginate(10);
        }else{
            $appointments = Appointment::has('checkupfee', '=', 0)->where('clinic_id', Auth::user()->clinic_id)->paginate(10);
        }
        $flag = "check_fee";
        return View::make('appointment_based_data.appointments', compact('appointments', 'flag'));
    });

    Route::get('app_test_fee', function(){
       if(Input::get('id') !== null){
            $appointments = Appointment::where('patient_id', Input::get('id'))->paginate(10);
        }else{
            $appointments = Appointment::has('labtests')->where('clinic_id', Auth::user()->clinic_id)->paginate(10);
        }
        $flag = "test_fee";
        return View::make('appointment_based_data.appointments', compact('appointments', 'flag'));
    });

    Route::resource('checkupfees', 'CheckupfeesController');

    Route::resource('testfees', 'TestfeesController');

    // PDF Reports
    Route::any('print_pres', ['uses' => 'HomeController@print_pres']);  // Prescription PDF
    Route::any('print_test', ['uses' => 'HomeController@print_test']);  // Test Report PDF

    // Prints
    Route::get('app_pres_print', function(){
        $appointments = Appointment::has('prescription')->where('clinic_id', Auth::user()->clinic_id)->paginate(10);
        $flag = "pres_print";
        return View::make('appointment_based_data.appointments', compact('appointments', 'flag'));
    });

    Route::get('pres_print', function(){
        $id = Input::get('id');
        $prescription = Prescription::findOrFail($id);
        $date = date('j F, Y', strtotime($prescription->appointment->date));
        $time = date('H:i:s', strtotime($prescription->appointment->time));
        $doctor_name = $prescription->appointment->employee->name;
        $patient = $prescription->appointment->patient;

        $medicines = [];

        if($prescription->medicine1_id){
            $name = $prescription->medicine1->name;
            $qty = $prescription->med1_qty;
            array_push($medicines, ['name' => $name, 'qty' => $qty]);
        }

        if($prescription->medicine2_id){
            $name = $prescription->medicine2->name;
            $qty = $prescription->med2_qty;
            array_push($medicines, ['name' => $name, 'qty' => $qty]);
        }

        if($prescription->medicine3_id){
            $name = $prescription->medicine3->name;
            $qty = $prescription->med3_qty;
            array_push($medicines, ['name' => $name, 'qty' => $qty]);
        }

        if($prescription->medicine4_id){
            $name = $prescription->medicine4->name;
            $qty = $prescription->med4_qty;
            array_push($medicines, ['name' => $name, 'qty' => $qty]);
        }

        if($prescription->medicine5_id){
            $name = $prescription->medicine5->name;
            $qty = $prescription->med5_qty;
            array_push($medicines, ['name' => $name, 'qty' => $qty]);
        }

        if($prescription->medicine6_id){
            $name = $prescription->medicine6->name;
            $qty = $prescription->med6_qty;
            array_push($medicines, ['name' => $name, 'qty' => $qty]);
        }

        return View::make('printables.prescription_print',
            compact('prescription', 'date', 'time', 'doctor_name', 'patient', 'medicines'));
    });

    Route::get('app_test_print', function(){
        $appointments = Appointment::has('labtests')->where('clinic_id', Auth::user()->clinic_id)->paginate(10);
        $flag = "test_print";
        return View::make('appointment_based_data.appointments', compact('appointments', 'flag'));
    });

    Route::get('test_print', function(){
        $id = Input::get('id');
        $test = Labtest::findOrFail($id);
        $patient = $test->appointment->patient;
        $date = date('j F, Y', strtotime($test->appointment->date));
        $time = date('H:i:s', strtotime($test->appointment->time));
        $doctor_name = $test->appointment->employee->name;

        return View::make('printables.test_print',
            compact('test', 'date', 'time', 'doctor_name', 'patient'));
    });

    Route::get('app_checkup_fee_print', function(){
        $appointments = Appointment::has('checkupfee')->where('clinic_id', Auth::user()->clinic_id)->paginate(10);
        $flag = "checkup_invoice";
        return View::make('appointment_based_data.appointments', compact('appointments', 'flag'));
    });

    Route::get('checkup_invoice_print', function(){
        $id = Input::get('id');
        $fee = Checkupfee::findOrFail($id);
        $patient = $fee->appointment->patient;
        $date = date('j F, Y', strtotime($fee->appointment->date));
        $time = date('H:i:s', strtotime($fee->appointment->time));
        $doctor_name = $fee->appointment->employee->name;

        return View::make('printables.checkup_invoice_print',
            compact('fee', 'date', 'time', 'doctor_name', 'patient'));
    });

    Route::get('app_test_fee_print', function(){
        $appointments = Appointment::has('labtests')->where('clinic_id', Auth::user()->clinic_id)->paginate(10);
        $flag = "test_invoice";
        return View::make('appointment_based_data.appointments', compact('appointments', 'flag'));
    });

    Route::get('test_invoice_print', function(){
        $id = Input::get('id');
        $appointment = Appointment::findOrFail($id);
        $tests = $appointment->labtests()->where('total_fee', '!=', 0)->get();

        $patient = $appointment->patient;
        $date = date('j F, Y', strtotime($appointment->date));
        $time = date('H:i:s', strtotime($appointment->time));
        $doctor_name = $appointment->employee->name;

        $sum = 0;
        foreach($tests as $test){
            $sum += $test->total_fee;
        }

        return View::make('printables.test_invoice_print',
            compact('sum', 'tests', 'date', 'time', 'doctor_name', 'patient'));
    });

    Route::get('pdf_record', function(){
        $id = Input::get('id');
        $patient = Patient::find($id);
        $appointments = $patient->appointments()->paginate(10);
        $flag = "pdf_record";
        return View::make('appointment_based_data.appointments', compact('appointments', 'flag', 'patient'));
    });

    Route::get('pdf', 'HomeController@pdf_record');

    Route::get('getSlots', 'TimeslotsController@getFreeSlots');


//****************************************************************//
    
});

//Roles
    // 1- Administrator
    // 2- Doctor
    // 3- Accountant
    // 4- Receptionist
    // 5- Lab Manager

// Appointment Statuses Values in DB
//    '0' = 'Reserved'
//    '1' = 'Waiting'
//    '2' = 'Check-in'
//    '3' = 'No Show'
//    '4' = 'Cancelled'
//    '5' = 'Closed'


