<?php

class PatientsController extends \BaseController {

	/**
	 * Display a listing of patients
	 *
	 * @return Response
	 */
	public function index()
	{
		$patients = Patient::where('clinic_id', Auth::user()->clinic_id)->paginate(10);

		return View::make('patients.index', compact('patients'));
	}

	/**
	 * Show the form for creating a new patient
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('patients.create');
	}

	/**
	 * Store a newly created patient in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Patient::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        $patient = new Patient();
        $patient->name = Input::get('name');
        $patient->dob = Input::get('dob');
        if(Input::has('email')){
            $patient->email = Input::get('email');
        }else{
            $patient->email = 'N/A';
        }
        $patient->gender = Input::get('gender');
        $patient->age = Input::get('age');
        $patient->city = Input::get('city');
        $patient->country = Input::get('country');
        $patient->address = Input::get('address');

        if(Input::get('phone') == ''){
            $patient->phone = 'N/A';
        }else {
            $patient->phone = Input::get('phone');
        }

        if(Input::get('cnic') == ''){
            $patient->cnic = 'N/A';
        }else {
            $patient->cnic = Input::get('cnic');
        }

        if(Input::get('note') == ''){
            $patient->note = 'N/A';
        }else {
            $patient->note = Input::get('note');
        }
        $patient->save();
        $patient->patient_id = "P0" . $patient->id;
        $patient->clinic_id = Auth::user()->clinic_id;
        $patient->save();

        if(Input::has('email')){
            $data = ['name' => Input::get('name')];
            Mail::queue('emails.patient_welcome', $data, function($message)
            {
                $message->to(Input::get('email'), Input::get('name'))->subject('Welcome to EMR!');
            });
        }

		return Redirect::route('patients.index');
	}

	/**
	 * Display the specified patient.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$patient = Patient::findOrFail($id);

		return View::make('patients.show', compact('patient'));
	}

	/**
	 * Show the form for editing the specified patient.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$patient = Patient::find($id);

		return View::make('patients.edit', compact('patient'));
	}

	/**
	 * Update the specified patient in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$patient = Patient::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Patient::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$patient->update($data);

		return Redirect::route('patients.index');
	}

	/**
	 * Remove the specified patient from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Patient::destroy($id);

		return Redirect::route('patients.index');
	}

    public function patients_reporting(){
        $appointments = Appointment::where('clinic_id', Auth::user()->clinic_id)->where('status', 5)->paginate(1);
        return View::make('patients.checked_patients', compact('appointments'));
    }
}
