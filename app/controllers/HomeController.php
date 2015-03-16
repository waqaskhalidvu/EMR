<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showLogin()
	{
		return View::make('login');
	}

	public function showAbout()
	{
		return View::make('about');
	}
	public function showServices()
	{
		return View::make('services');
	}

	public function showContacts()
	{
		return View::make('contacts');
	}

	public function showDoctor_home()
	{
		$appointments = Auth::user()->appointments()->get();
		return View::make('doctor.doctor_home', compact('appointments'));
	}

	public function showReceptionist_home()
	{
		return View::make('receptionist.receptionist_home');
	}

	public function showLabmanager_home()
	{
		return View::make('lab.labmanager_home');
	}

	public function showAccountant_home()
	{
		return View::make('accountant.accountant_home');
	}

	public function showAdmin_home()
	{
		return View::make('admin.admin_home');
	}

	public function showUserRegistrationForm(){

		return View::make('admin.register_user');
	}

	public function showSearchPMR(){
        $patients = Patient::all();
		return View::make('medical_records.search-pmr', compact('patients'));
	}

	public function showViewPMR(){
        $patient_id = Input::get('id');
        $patient = Patient::findOrFail($patient_id);
		return View::make('medical_records.view-pmr', compact('patient_id', 'patient'));
	}

    public function print_pres(){
        $id = Input::get('id');
        $prescription = Prescription::findOrFail($id);
        $date = date('j F, Y', strtotime($prescription->appointment->date));
        $time = date('H:i:s', strtotime($prescription->appointment->time));
        $doctor_name = $prescription->appointment->employee->name;
        $patient = $prescription->appointment->patient;


        $html = "<html><body>"
            .   " <img src='./images/logo_new1.jpg'/>
                <center>
                    <h1> Prescription </h1>
                </center>
                <table style='border-collapse: collapse; margin-left:auto; margin-right:auto' cellpadding='7' border='1'>

                    <tr>
                        <td height='20'><label>Patient Name:</label></td>
                        <td><label> $patient->name </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Patient ID:</label></td>
                        <td><label> $patient->patient_id </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Visit Date:</label></td>
                        <td><label> $date </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Visit Time:</label></td>
                        <td><label> $time </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Doctor Name:</label></td>
                        <td><label> $doctor_name </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Prescription Code:</label></td>
                        <td><label> $prescription->code </label></td>
                    </tr>
                    <tr>
                        <td height='20'> <label>Medicines:</label></td>
                        <td><label> $prescription->medicines </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Note:</label></td>
                        <td><label> $prescription->note </label></td>
                    </tr>
                </table>"
            . "</body></html>";
        return PDF::load($html, 'A4', 'portrait')->show();
    }

    public function print_test(){
        $id = Input::get('id');
        $test = Labtest::findOrFail($id);
        $patient = $test->appointment->patient;
        $date = date('j F, Y', strtotime($test->appointment->date));
        $time = date('H:i:s', strtotime($test->appointment->time));
        $doctor_name = $test->appointment->employee->name;

        $html = "<html><body>"
            .   " <img src='./images/logo_new1.jpg'/>
                <center>
                    <h1><u> Lab Test Report </u></h1>
                </center>
                <table style='width: 80%; border-collapse: collapse; margin-left:auto; margin-right:auto' cellpadding='7' border='1'>

                    <tr>
                        <td height='20'><label>Patient Name:</label></td>
                        <td><label> $patient->name </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Patient ID:</label></td>
                        <td><label> $patient->patient_id </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Visit Date:</label></td>
                        <td><label> $date </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Visit Time:</label></td>
                        <td><label> $time </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Doctor Name:</label></td>
                        <td><label> $doctor_name </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Test Name:</label></td>
                        <td><label> $test->test_name </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Description:</label></td>
                        <td><label> $test->test_description </label></td>
                    </tr>
                    <tr>
                        <td height='20'> <label>Test Results:</label></td>
                        <td><label> $test->test_results </label></td>
                    </tr>
                </table>"
            . "</body></html>";
        return PDF::load($html, 'A4', 'portrait')->show();
    }

}
