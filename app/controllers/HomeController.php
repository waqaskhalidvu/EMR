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

    public function showSuper_home(){
        return View::make('super.super_home');
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
        $medicines = [];
        foreach(explode(',', $prescription->medicines) as $id){
            array_push($medicines, Medicine::find($id));
        }

        $html = "<html><body>"
            .   " <img src='./images/logo_new1.jpg'/>
                <center>
                    <h1><u> Prescription </u></h1>
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
                        <td><label>";

        foreach($medicines as $index => $medicine) {
            $html .= $index + 1 . ' - ' . $medicine->name . "<br />";
        }
        $html .= "</label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Note:</label></td>
                        <td><label> $prescription->note </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Dignostic Procedure:</label></td>
                        <td><label> $prescription->procedure </label></td>
                    </tr>
                </table>"
            . "</body></html>";
        return PDF::load($html, 'A4', 'portrait')->show($patient->name.' Prescription');
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
        return PDF::load($html, 'A4', 'portrait')->show($patient->name. ' Test Report');
    }

    function pdf_record(){
        $appointment = Appointment::find(Input::get('id'));
        $patient = $appointment->patient;

//      Personal Information
        $dob = date('j F, Y', strtotime($patient->dob));
        $html = "<html><body>"
            .   " <img src='./images/logo_new1.jpg'/>
                <center>
                    <h1><u> $patient->name Medical Record </u></h1>
                </center>
                <table style='width: 80%; border-collapse: collapse; margin-left:auto; margin-right:auto' cellpadding='7' border='1'>
                    <caption>(Personal Information)</caption>
                    <tr>
                        <td height='20'><label>Patient Name:</label></td>
                        <td><label> $patient->name </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Patient ID:</label></td>
                        <td><label> $patient->patient_id </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Date of Birth:</label></td>
                        <td><label> $dob </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Gender:</label></td>
                        <td><label> $patient->gender </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Age:</label></td>
                        <td><label> $patient->age Years</label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Email:</label></td>
                        <td><label> $patient->email </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>City:</label></td>
                        <td><label> $patient->city </label></td>
                    </tr>
                    <tr>
                        <td height='20'> <label>Country:</label></td>
                        <td><label> $patient->country </label></td>
                    </tr>
                    <tr>
                        <td height='20'> <label>Address:</label></td>
                        <td><label> $patient->address </label></td>
                    </tr>
                    <tr>
                        <td height='20'> <label>Phone:</label></td>
                        <td><label> $patient->phone </label></td>
                    </tr>
                    <tr>
                        <td height='20'> <label>CNIC:</label></td>
                        <td><label> $patient->cnic </label></td>
                    </tr>
                    <tr>
                        <td height='20'> <label>Additional Info:</label></td>
                        <td><label> $patient->note </label></td>
                    </tr>
                </table>";

//      Appointment Details
        $doctor = $appointment->employee->name;
        $visit_date = date('j F, Y', strtotime($appointment->date));
        if($appointment->checkupfee){
            $checkup_fee = $appointment->checkupfee->checkup_fee;
        }else{
            $checkup_fee = 0;
        }

        $html .= "<br> <br>
                <table style='border-collapse: collapse; margin-left:auto; margin-right:auto' cellpadding='7' border='1'>
                    <caption>(Appointment Details)</caption>
                    <tr>
                        <td height='20'><label>Visit Date:</label></td>
                        <td><label> $visit_date </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Visit Time:</label></td>
                        <td><label> $appointment->time </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Doctor Name:</label></td>
                        <td><label> $doctor </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Checkup Reason:</label></td>
                        <td><label> $appointment->checkup_reason </label></td>
                    </tr>
                    <tr>
                        <td height='20'> <label>Checkup Fee:</label></td>
                        <td><label> $checkup_fee-/Rs </label></td>
                    </tr>
                </table>";


//      Prescription
        if($appointment->prescription) {
            $medicines = [];
            foreach(explode(',', $appointment->prescription->medicines) as $id){
                array_push($medicines, Medicine::find($id));
            }

            $doctor = $appointment->employee->name;
            $code = $appointment->prescription->code;
            $note = $appointment->prescription->note;
            $proc = $appointment->prescription->procedure;
            $html .= "<br> <br> <br> <br> <br>
                <table style='border-collapse: collapse; margin-left:auto; margin-right:auto' cellpadding='7' border='1'>
                    <caption>(Prescription)</caption>
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
                        <td><label> $appointment->date </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Visit Time:</label></td>
                        <td><label> $appointment->time </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Doctor Name:</label></td>
                        <td><label> $doctor </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Prescription Code:</label></td>
                        <td><label> $code </label></td>
                    </tr>
                    <tr>
                        <td height='20'> <label>Medicines:</label></td>
                        <td><label>";
        foreach($medicines as $index => $medicine) {
            $html .= $index + 1 . ' - ' . $medicine->name . "<br />";
        }
        $html .= "</label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Note:</label></td>
                        <td><label> $note </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Diagnostic Procedure:</label></td>
                        <td><label> $proc </label></td>
                    </tr>
                </table>";
        }

//      Vitalsigns
        if($appointment->vitalsign) {
            $note = $appointment->vitalsign->note;
            $vitals = $appointment->vitalsign;
            $html .= "<br> <br>
                <table style='border-collapse: collapse; margin-left:auto; margin-right:auto' cellpadding='7' border='1'>
                    <caption>(Vital Signs)</caption>
                    <tr>
                        <td height='20'><label>Patient Height:</label></td>
                        <td><label> $vitals->height - cm </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Patient Weight:</label></td>
                        <td><label> $vitals->weight - kg </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Blood Pressure (Systolic):</label></td>
                        <td><label> $vitals->bp_systolic - mmHg </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Blood Pressure (Diastolic):</label></td>
                        <td><label> $vitals->bp_diastolic - mmHg </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Blood Group:</label></td>
                        <td><label> $vitals->blood_group </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Pulse Rate:</label></td>
                        <td><label> $vitals->pulse_rate - per min </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Respiration Rate:</label></td>
                        <td><label> $vitals->respiration_rate - per min </label></td>
                    </tr>
                    <tr>
                        <td height='20'> <label>Temperature:</label></td>
                        <td><label> $vitals->temprature - $vitals->temprature_unit </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Note:</label></td>
                        <td><label> $vitals->note </label></td>
                    </tr>
                </table>";
        }

//        Diagnostic Procedure
        if($appointment->diagonosticprocedure) {
            $note = $appointment->diagonosticprocedure->procedure_note;
            $html .= "<br> <br>
                <table style='border-collapse: collapse; margin-left:auto; margin-right:auto' cellpadding='7' border='1'>
                    <caption>(Diagnostic Procedure)</caption>
                    <tr>
                        <td height='20'><label>Procedure Note:</label></td>
                        <td><label> $note </label></td>
                    </tr>
                </table>";
        }

//        Lab Tests
        if($appointment->labtests) {
            foreach($appointment->labtests as $labtest){
                $html .= "<br> <br>
                <table style='border-collapse: collapse; margin-left:auto; margin-right:auto' cellpadding='7' border='1'>
                    <caption>(Lab Test)</caption>
                    <tr>
                        <td height='20'><label>Test Name:</label></td>
                        <td><label> $labtest->test_name </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Test Description:</label></td>
                        <td><label> $labtest->test_description </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Test Results:</label></td>
                        <td><label> $labtest->test_results </label></td>
                    </tr>
                </table>";
            }
        }

        //        Family History
        if($patient->familyhistories){
            foreach($patient->familyhistories as $familyhistory){
                $html .= "<br> <br>
                <table style='border-collapse: collapse; margin-left:auto; margin-right:auto' cellpadding='7' border='1'>
                    <caption>(Family History)</caption>
                    <tr>
                        <td height='20'><label>Family Member Name:</label></td>
                        <td><label> $familyhistory->f_member_name </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Relation wtih Patient:</label></td>
                        <td><label> $familyhistory->patient_relation </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Gender:</label></td>
                        <td><label> $familyhistory->gender </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Age:</label></td>
                        <td><label> $familyhistory->age </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Disease Note:</label></td>
                        <td><label> $familyhistory->diesease_note </label></td>
                    </tr>
                </table>";
            }
        }

        //        Surgical History
        if($patient->surgicalhistories){
            foreach($patient->surgicalhistories as $surgicalhistory){
                $date = date('j F, Y', strtotime($surgicalhistory->surgery_date));
                $html .= "<br> <br>
                <table style='border-collapse: collapse; margin-left:auto; margin-right:auto' cellpadding='7' border='1'>
                    <caption>(Surgical History)</caption>
                    <tr>
                        <td height='20'><label>Surgery Name:</label></td>
                        <td><label> $surgicalhistory->surgery_name </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Surgery Date:</label></td>
                        <td><label> $date </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Surgery Note:</label></td>
                        <td><label> $surgicalhistory->surgery_notes </label></td>
                    </tr>
                </table>";
            }
        }

//        Previous Diseases
        if($patient->previousdiseases){
            foreach($patient->previousdiseases as $disease){
                $html .= "<br> <br>
                <table style='border-collapse: collapse; margin-left:auto; margin-right:auto' cellpadding='7' border='1'>
                    <caption>(Previous Disease)</caption>
                    <tr>
                        <td height='20'><label>Disease Name:</label></td>
                        <td><label> $disease->disease_name </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Disease Note:</label></td>
                        <td><label> $disease->disease_notes </label></td>
                    </tr>
                </table>";
            }
        }

//        Drug Usage
        if($patient->drugusages){
            foreach($patient->drugusages as $drug){
                $html .= "<br> <br>
                <table style='border-collapse: collapse; margin-left:auto; margin-right:auto' cellpadding='7' border='1'>
                    <caption>(Drug Usage)</caption>
                    <tr>
                        <td height='20'><label>Drug Name:</label></td>
                        <td><label> $drug->drug_name </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Usage Note:</label></td>
                        <td><label> $drug->usage_note </label></td>
                    </tr>
                </table>";
            }
        }

//        Allergy
        if($patient->allergies){
            foreach($patient->allergies as $allergy){
                $html .= "<br> <br>
                <table style='border-collapse: collapse; margin-left:auto; margin-right:auto' cellpadding='7' border='1'>
                    <caption>(Allergy)</caption>
                    <tr>
                        <td height='20'><label>Allergy Name:</label></td>
                        <td><label> $allergy->allergy_name </label></td>
                    </tr>
                    <tr>
                        <td height='20'><label>Allergy Note:</label></td>
                        <td><label> $allergy->allergy_note </label></td>
                    </tr>
                </table>";
            }
        }

        $html .= "</body></html>";
        return PDF::load($html, 'A4', 'portrait')->show($patient->name. ' Medical Record');
    }

}
