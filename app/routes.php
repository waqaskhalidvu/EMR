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

Route::get('/about', 'HomeController@showAbout');

Route::get('/services', 'HomeController@showServices');

Route::get('/contacts', 'HomeController@showContacts');

Route::post('validate', 'EmployeesController@validate');

Route::controller('password', 'RemindersController');

Route::get('remind', 'RemindersController@getRemind');

/////////////////////////////////////// PRIVATE ROUTES ////////////////////////////////////////////
Route::group(array('before' => 'auth'), function(){

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

    // Medical Record Routes
    Route::get('search_pmr', 'HomeController@showSearchPMR');
    Route::any('view_pmr', 'HomeController@showViewPMR');

    Route::resource('dutydays', 'DutydaysController');

    Route::resource('timeslots', 'TimeslotsController');

    Route::resource('appointments', 'AppointmentsController');

    Route::get('app_vitals', function(){
        if(Auth::user()->role == 'Administrator' || Auth::user()->role == 'Receptionist'){
            $appointments = Appointment::has('vitalsign', '=', 0)->get();
        }elseif(Auth::user()->role == 'Doctor'){
            $appointments = Appointment::has('vitalsign')->where('employee_id', Auth::id())->get();
        }
        $flag = "vitals";
        return View::make('appointment_based_data.appointments', compact('appointments', 'flag'));
    });

    Route::get('app_prescription', function(){
        $appointments = Appointment::has('prescription', '=', 0)->get();
        $flag = "prescription";
        return View::make('appointment_based_data.appointments', compact('appointments', 'flag'));
    });

    Route::get('app_tests', function(){
        if(Input::get('id') !== null){
            $appointments = Appointment::where('patient_id', Input::get('id'))->get();
        }else{
            $appointments = Appointment::all();
        }
        $flag = "test";
        return View::make('appointment_based_data.appointments', compact('appointments', 'flag'));
    });

    Route::get('app_proc', function(){
        $appointments = Appointment::has('prescription', '=', 0)->get();
        $flag = "proc";
        return View::make('appointment_based_data.appointments', compact('appointments', 'flag'));
    });

    Route::get('app_check_fee', function(){
        if(Auth::user()->role == "Accountant"){
            $appointments = Appointment::all();
        }else{
            $appointments = Appointment::has('checkupfee', '=', 0)->get();
        }
        $flag = "check_fee";
        return View::make('appointment_based_data.appointments', compact('appointments', 'flag'));
    });

    Route::get('app_test_fee', function(){
       if(Input::get('id') !== null){
            $appointments = Appointment::where('patient_id', Input::get('id'))->get();
        }else{
            $appointments = Appointment::has('labtests')->get();
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
        $appointments = Appointment::has('prescription')->get();
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

        return View::make('printables.prescription_print',
            compact('prescription', 'date', 'time', 'doctor_name', 'patient'));
    });

    Route::get('app_test_print', function(){
        $appointments = Appointment::has('labtests')->get();
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
        $appointments = Appointment::has('checkupfee')->get();
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
        $appointments = Appointment::has('labtests')->get();
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

    //    Ajax Requests
    Route::get('getSlots', 'TimeslotsController@getFreeSlots');
//****************************************************************//
    
});

//Roles
    // 1- Administrator
    // 2- Doctor
    // 3- Accountant
    // 4- Receptionist
    // 5- Lab Manager

// Anointment Statuses Values in DB
//    '0' = 'Reserved'
//    '1' = 'Waiting'
//    '2' = 'Check-in'
//    '3' = 'No Show'
//    '4' = 'Cancelled'
//    '5' = 'Closed'


