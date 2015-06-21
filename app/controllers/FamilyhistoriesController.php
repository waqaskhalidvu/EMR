<?php

class FamilyhistoriesController extends \BaseController {

	/**
	 * Display a listing of familyhistories
	 *
	 * @return Response
	 */
	public function index()
	{
        $patient_id = Input::get('id');
        $patient = Patient::find($patient_id);
        $familyhistories = $patient->familyhistories()->paginate(10);

		return View::make('familyhistories.index', compact('patient', 'familyhistories'));
	}

	/**
	 * Show the form for creating a new familyhistory
	 *
	 * @return Response
	 */
	public function create()
	{
        $patient_id = Input::get('id');
		return View::make('familyhistories.create', compact('patient_id'));
	}

	/**
	 * Store a newly created familyhistory in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$data = Input::all();
        $validator = Validator::make($data, array('f_member_name' => 'required', 'patient_relation' => 'required', 'gender' => 'required', 'age' => 'required'));

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
        $data['clinic_id'] = Auth::user()->clinic_id;

		Familyhistory::create($data);

		return Redirect::to('familyhistories?id='.$data['patient_id']);
	}

	/**
	 * Display the specified familyhistory.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$familyhistory = Familyhistory::findOrFail($id);

		return View::make('familyhistories.show', compact('familyhistory'));
	}

	/**
	 * Show the form for editing the specified familyhistory.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$familyhistory = Familyhistory::find($id);

		return View::make('familyhistories.edit', compact('familyhistory'));
	}

	/**
	 * Update the specified familyhistory in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$familyhistory = Familyhistory::findOrFail($id);

		$data = Input::all();
        $validator = Validator::make($data, array('f_member_name' => 'required', 'patient_relation' => 'required', 'gender' => 'required', 'age' => 'required'));

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$data['patient_id'] = $familyhistory->patient_id;

		$familyhistory->update($data);

		return Redirect::to('familyhistories?id='.$familyhistory->patient_id);
	}

	/**
	 * Remove the specified familyhistory from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Familyhistory::destroy($id);

		return Redirect::route('familyhistories.index');
	}

}
