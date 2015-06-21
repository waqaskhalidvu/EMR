<?php

class PreviousdiseasesController extends \BaseController {

	/**
	 * Display a listing of previousdiseases
	 *
	 * @return Response
	 */
	public function index()
	{
		$patient_id = Input::get('id');
        $patient = Patient::find($patient_id);
        $previousdiseases = $patient->previousdiseases()->paginate(1);

		return View::make('previousdiseases.index', compact('patient', 'previousdiseases'));
	}

	/**
	 * Show the form for creating a new previousdisease
	 *
	 * @return Response
	 */
	public function create()
	{
		$patient_id = Input::get('id');
		return View::make('previousdiseases.create', compact('patient_id'));
	}

	/**
	 * Store a newly created previousdisease in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), array('disease_name' => 'required'));

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        $data['clinic_id'] = Auth::user()->clinic_id;
		Previousdisease::create($data);

		return Redirect::to('previousdiseases?id='.$data['patient_id']);
	}

	/**
	 * Display the specified previousdisease.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$previousdisease = Previousdisease::findOrFail($id);

		return View::make('previousdiseases.show', compact('previousdisease'));
	}

	/**
	 * Show the form for editing the specified previousdisease.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$previousdisease = Previousdisease::find($id);

		return View::make('previousdiseases.edit', compact('previousdisease'));
	}

	/**
	 * Update the specified previousdisease in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$previousdisease = Previousdisease::findOrFail($id);

		$validator = Validator::make($data = Input::all(), array('disease_name' => 'required'));

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
		
		$data['patient_id'] = $previousdisease->patient_id;

		$previousdisease->update($data);

		return Redirect::to('previousdiseases?id='.$previousdisease->patient_id);
	}

	/**
	 * Remove the specified previousdisease from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Previousdisease::destroy($id);

		return Redirect::route('previousdiseases.index');
	}

}
