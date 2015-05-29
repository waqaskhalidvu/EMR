<?php

class DiagonosticproceduresController extends \BaseController {

	/**
	 * Display a listing of diagonosticprocedures
	 *
	 * @return Response
	 */
	public function index()
	{
		$patient_id = Input::get('id');
        $patient = Patient::find($patient_id);
        $appointments = $patient->appointments()->has('diagonosticprocedure')->get();
		return View::make('diagonosticprocedures.index', compact('appointments'));
	}

	/**
	 * Show the form for creating a new diagonosticprocedure
	 *
	 * @return Response
	 */
	public function create()
	{
		$appointment = Appointment::find(Input::get('id'));
        $patient_id = $appointment->patient->id;
		return View::make('diagonosticprocedures.create', compact('appointment', 'patient_id'));
	}

	/**
	 * Store a newly created diagonosticprocedure in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Diagonosticprocedure::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Diagonosticprocedure::create($data);

		return Redirect::to('/app_proc');
	}

	/**
	 * Display the specified diagonosticprocedure.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$diagonosticprocedure = Diagonosticprocedure::where('appointment_id', $id)->get()->first();
		
		return View::make('diagonosticprocedures.show', compact('diagonosticprocedure'));
	}

	/**
	 * Show the form for editing the specified diagonosticprocedure.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$diagonosticprocedure = Diagonosticprocedure::where('appointment_id', $id)->get()->first();

		return View::make('diagonosticprocedures.edit', compact('diagonosticprocedure'));
	}

	/**
	 * Update the specified diagonosticprocedure in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$diagonosticprocedure = Diagonosticprocedure::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Diagonosticprocedure::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$data['patient_id'] = $diagonosticprocedure->patient_id;

		$diagonosticprocedure->update($data);

		return Redirect::to('diagonosticprocedures?id='.$diagonosticprocedure->patient_id);
	}

	/**
	 * Remove the specified diagonosticprocedure from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Diagonosticprocedure::destroy($id);

		return Redirect::route('diagonosticprocedures.index');
	}

}
