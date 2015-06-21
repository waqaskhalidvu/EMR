<?php

class SurgicalhistoriesController extends \BaseController {

	/**
	 * Display a listing of surgicalhistories
	 *
	 * @return Response
	 */
	public function index()
	{
		$patient_id = Input::get('id');
        $patient = Patient::find($patient_id);
        $surgicalhistories = $patient->surgicalhistories()->paginate(10);

		return View::make('surgicalhistories.index', compact('patient', 'surgicalhistories'));
	}

	/**
	 * Show the form for creating a new surgicalhistory
	 *
	 * @return Response
	 */
	public function create()
	{
		$patient_id = Input::get('id');
		return View::make('surgicalhistories.create', compact('patient_id'));
	}

	/**
	 * Store a newly created surgicalhistory in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), array('surgery_name' => 'required', 'surgery_date' => 'date|required'));

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        $data['clinic_id'] = Auth::user()->clinic_id;
		Surgicalhistory::create($data);

		return Redirect::to('surgicalhistories?id='.$data['patient_id']);
	}

	/**
	 * Display the specified surgicalhistory.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$surgicalhistory = Surgicalhistory::findOrFail($id);

		return View::make('surgicalhistories.show', compact('surgicalhistory'));
	}

	/**
	 * Show the form for editing the specified surgicalhistory.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$surgicalhistory = Surgicalhistory::find($id);

		return View::make('surgicalhistories.edit', compact('surgicalhistory'));
	}

	/**
	 * Update the specified surgicalhistory in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$surgicalhistory = Surgicalhistory::findOrFail($id);

		$validator = Validator::make($data = Input::all(), array('surgery_name' => 'required', 'surgery_date' => 'date|required'));

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$data['patient_id'] = $surgicalhistory->patient_id;

		$surgicalhistory->update($data);

		return Redirect::to('surgicalhistories?id='.$surgicalhistory->patient_id);
	}

	/**
	 * Remove the specified surgicalhistory from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Surgicalhistory::destroy($id);

		return Redirect::route('surgicalhistories.index');
	}

}
