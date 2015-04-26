<?php

class PatientsController extends \BaseController {

	/**
	 * Display a listing of patients
	 *
	 * @return Response
	 */
	public function index()
	{
		$patients = Patient::all();

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
        $patient->save();
        $patient->dob = Input::get('dob');
        $patient->save();
        if(Input::has('email')){
            $patient->email = Input::get('email');
            $patient->save();
        }else{
            $patient->email = 'N/A';
            $patient->save();
        }
        $patient->gender = Input::get('gender');
        $patient->save();
        $patient->age = Input::get('age');
        $patient->save();
        $patient->city = Input::get('city');
        $patient->save();
        $patient->country = Input::get('country');
        $patient->save();
        $patient->address = Input::get('address');
        $patient->save();

        if(Input::get('phone') == ''){
            $patient->phone = 'N/A';
        }else {
            $patient->phone = Input::get('phone');
        }
        $patient->save();

        if(Input::get('cnic') == ''){
            $patient->cnic = 'N/A';
        }else {
            $patient->cnic = Input::get('cnic');
        }
        $patient->save();

        if(Input::get('note') == ''){
            $patient->note = 'N/A';
        }else {
            $patient->note = Input::get('note');
        }
        $patient->save();

        $patient->patient_id = "P0" . $patient->id;
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

}
