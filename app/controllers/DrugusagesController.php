<?php

class DrugusagesController extends \BaseController {

	/**
	 * Display a listing of drugusages
	 *
	 * @return Response
	 */
	public function index()
	{
		$patient_id = Input::get('id');
        $patient = Patient::find($patient_id);
        $drugusages = $patient->drugusages()->paginate(1);
		return View::make('drugusages.index', compact('patient', 'drugusages'));
	}

	/**
	 * Show the form for creating a new drugusage
	 *
	 * @return Response
	 */
	public function create()
	{
		$patient_id = Input::get('id');
		return View::make('drugusages.create', compact('patient_id'));
	}

	/**
	 * Store a newly created drugusage in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), array('drug_name' => 'required'));

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        $data['clinic_id'] = Auth::user()->clinic_id;
		Drugusage::create($data);

		return Redirect::to('drugusages?id='.$data['patient_id']);
	}

	/**
	 * Display the specified drugusage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$drugusage = Drugusage::findOrFail($id);

		return View::make('drugusages.show', compact('drugusage'));
	}

	/**
	 * Show the form for editing the specified drugusage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$drugusage = Drugusage::find($id);

		return View::make('drugusages.edit', compact('drugusage'));
	}

	/**
	 * Update the specified drugusage in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$drugusage = Drugusage::findOrFail($id);

		$validator = Validator::make($data = Input::all(), array('drug_name' => 'required'));

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$data['patient_id'] = $drugusage->patient_id;

		$drugusage->update($data);

		return Redirect::to('drugusages?id='.$drugusage->patient_id);
	}

	/**
	 * Remove the specified drugusage from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Drugusage::destroy($id);

		return Redirect::route('drugusages.index');
	}

}
