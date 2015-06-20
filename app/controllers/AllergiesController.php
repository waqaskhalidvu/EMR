<?php

class AllergiesController extends \BaseController {

	/**
	 * Display a listing of allergies
	 *
	 * @return Response
	 */
	public function index()
	{
		$patient_id = Input::get('id');
        $patient = Patient::find($patient_id);
        $allergies = $patient->allergies()->paginate(10);

		return View::make('allergies.index', compact('allergies', 'patient'));
	}

	/**
	 * Show the form for creating a new allergy
	 *
	 * @return Response
	 */
	public function create()
	{
		$patient_id = Input::get('id');
		return View::make('allergies.create', compact('patient_id'));
	}

	/**
	 * Store a newly created allergy in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), array('allergy_name' => 'required'));

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        $data['clinic_id'] = Auth::user()->clinic_id;
		Allergy::create($data);

		return Redirect::to('allergies?id='.$data['patient_id']);
	}

	/**
	 * Display the specified allergy.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$allergy = Allergy::findOrFail($id);

		return View::make('allergies.show', compact('allergy'));
	}

	/**
	 * Show the form for editing the specified allergy.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$allergy = Allergy::find($id);

		return View::make('allergies.edit', compact('allergy'));
	}

	/**
	 * Update the specified allergy in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$allergy = Allergy::findOrFail($id);

		$validator = Validator::make($data = Input::all(), array('allergy_name' => 'required'));

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$data['patient_id'] = $allergy->patient_id;

		$allergy->update($data);

		return Redirect::to('allergies?id='.$allergy->patient_id);
	}

	/**
	 * Remove the specified allergy from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Allergy::destroy($id);

		return Redirect::route('allergies.index');
	}

}
