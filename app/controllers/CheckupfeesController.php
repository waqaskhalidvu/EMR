<?php

class CheckupfeesController extends \BaseController {

	/**
	 * Display a listing of checkupfees
	 *
	 * @return Response
	 */
	public function index()
	{
		$patient_id = Input::get('id');
        $patient = Patient::find($patient_id);
        $appointments = $patient->appointments()->has('checkupfee')->paginate(10);

        return View::make('checkupfees.index', compact('appointments', 'patient'));
	}

	/**
	 * Show the form for creating a new checkupfee
	 *
	 * @return Response
	 */
	public function create()
	{
		$appointment = Appointment::find(Input::get('id'));
        $patient_id = $appointment->patient->id;
        
        return View::make('checkupfees.create', compact('appointment', 'patient_id'));
	}

	/**
	 * Store a newly created checkupfee in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Checkupfee::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        $data['clinic_id'] = Auth::user()->clinic_id;
		Checkupfee::create($data);

		return Redirect::to('/app_check_fee');
	}

	/**
	 * Display the specified checkupfee.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$checkupfee = Checkupfee::where('appointment_id', $id)->get()->first();

        if(Input::get('flag') != null){
            $flag = Input::get('flag');
            if($flag == 'checkup_invoice'){
                return View::make('checkupfees.show', compact('checkupfee', 'flag'));
            }
        }
		
		return View::make('checkupfees.show', compact('checkupfee'));
	}

	/**
	 * Show the form for editing the specified checkupfee.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$checkupfee = Checkupfee::where('appointment_id', $id)->get()->first();

		return View::make('checkupfees.edit', compact('checkupfee'));	
	}

	/**
	 * Update the specified checkupfee in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$checkupfee = Checkupfee::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Checkupfee::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$data['patient_id'] = $checkupfee->patient_id;

        $checkupfee->update($data);

        if(Auth::user()->role == 'Accountant'){
        	return Redirect::to('/app_check_fee');
        }

        return Redirect::to('checkupfees?id='.$checkupfee->patient_id);
	}

	/**
	 * Remove the specified checkupfee from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Checkupfee::destroy($id);

		return Redirect::route('checkupfees.index');
	}

}
