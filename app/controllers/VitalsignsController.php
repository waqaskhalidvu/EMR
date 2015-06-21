<?php
 
class VitalsignsController extends \BaseController {

	/**
	 * Display a listing of vitalsigns
	 *
	 * @return Response
	 */
	public function index()
	{
		$patient_id = Input::get('id');
        $patient = Patient::find($patient_id);
        $appointments = $patient->appointments()->has('vitalsign')->paginate(1);

		return View::make('vitalsigns.index', compact('appointments', 'patient_id'));
	}

	/**
	 * Show the form for creating a new vitalsign
	 *
	 * @return Response
	 */
	public function create()
	{
		$appointment = Appointment::findOrFail(Input::get('id'));

		return View::make('vitalsigns.create', compact('appointment'));
	}

	/**
	 * Store a newly created vitalsign in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Vitalsign::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        $data['clinic_id'] = Auth::user()->clinic_id;
		Vitalsign::create($data);

		return Redirect::to('/app_vitals');
	}

	/**
	 * Display the specified vitalsign.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$vitalsign = Vitalsign::where('appointment_id', $id)->get()->first();

		return View::make('vitalsigns.show', compact('vitalsign'));
	}

	/**
	 * Show the form for editing the specified vitalsign.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$vitalsign = Vitalsign::where('appointment_id', $id)->get()->first();

		return View::make('vitalsigns.edit', compact('vitalsign'));
	}

	/**
	 * Update the specified vitalsign in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$vitalsign = Vitalsign::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Vitalsign::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$data['patient_id'] = $vitalsign->patient_id;

		$vitalsign->update($data);

		return Redirect::to('vitalsigns?id='.$vitalsign->patient_id);
	}

	/**
	 * Remove the specified vitalsign from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Vitalsign::destroy($id);

		return Redirect::route('vitalsigns.index');
	}

}
