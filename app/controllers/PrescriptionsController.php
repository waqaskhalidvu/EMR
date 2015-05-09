<?php

class PrescriptionsController extends \BaseController {

	/**
	 * Display a listing of prescriptions
	 *
	 * @return Response
	 */
	public function index()
	{
        $patient_id = Input::get('id');
        $patient = Patient::find($patient_id);
        $appointments = $patient->appointments()->has('prescription')->get();

        return View::make('prescriptions.index', compact('appointments'));
	}

	/**
	 * Show the form for creating a new prescription
	 *
	 * @return Response
	 */
	public function create()
	{
		$appointment = Appointment::find(Input::get('id'));
        $patient_id = $appointment->patient->id;
        $doctors = Employee::where('role', 'Doctor')->where('status', 'Active')->get();
        $medicines = Medicine::all()->lists('name', 'id');

        return View::make('prescriptions.create', compact('medicines', 'appointment', 'patient_id', 'doctors'));
	}

	/**
	 * Store a newly created prescription in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Prescription::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        $medicines_id = Input::get('medicines');

        foreach($medicines_id as $id){
            $medicine = Medicine::find($id);
            $medicine->quantity -= 1;
            $medicine->update();
        }
        $data['medicines'] = implode(",",$medicines_id);

		Prescription::create($data);

        return Redirect::to('/app_prescription');
	}

	/**
	 * Display the specified prescription.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$prescription = Prescription::where('appointment_id', $id)->get()->first();
        if(Input::get('flag') != null) {
            $flag = Input::get('flag');
        }

        $medicines = [];
        foreach(explode(',', $prescription->medicines) as $id){
            array_push($medicines, Medicine::find($id));
        }

		return View::make('prescriptions.show', compact('prescription', 'flag', 'medicines'));
	}

	/**
	 * Show the form for editing the specified prescription.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$prescription = Prescription::where('appointment_id', $id)->get()->first();

        $medicines = Medicine::all()->lists('name', 'id');

        $old_medicines = explode(',', $prescription->medicines);

		return View::make('prescriptions.edit', compact('old_medicines', 'prescription', 'medicines'));
	}

	/**
	 * Update the specified prescription in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$prescription = Prescription::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Prescription::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        $data['patient_id'] = $prescription->patient_id;

        foreach(Input::get('medicines') as $id){
            if(!in_array($id, explode(',', $prescription->medicines))){
                $medicine = Medicine::find($id);
                $medicine->quantity -= 1;
                $medicine->update();
            }
        }

        foreach(explode(',', $prescription->medicines) as $old_id){
            if(!in_array($old_id, Input::get('medicines'))){
                $medicine = Medicine::find($old_id);
                $medicine->quantity += 1;
                $medicine->update();
            }
        }

        $data['medicines'] = implode(",",Input::get('medicines'));

        $prescription->update($data);

        return Redirect::to('prescriptions?id='.$prescription->patient_id);
	}

	/**
	 * Remove the specified prescription from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Prescription::destroy($id);

		return Redirect::route('prescriptions.index');
	}

}
