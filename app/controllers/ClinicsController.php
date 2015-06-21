<?php

class ClinicsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /clinics
	 *
	 * @return Response
	 */
	public function index()
	{
		$clinics = Clinic::paginate(10);
        return View::make('clinics.index', compact('clinics'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /clinics/create
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('clinics.create');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /clinics
	 *
	 * @return Response
	 */
	public function store()
	{
        $data = Input::all();
        $validator = Validator::make($data, array('password' => 'min:6','email' => 'unique:employees', 'status' => 'required', 'clinic_name' => 'required', 'clinic_address' => 'required'));

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $clinic = Clinic::create(['name' => $data['clinic_name'], 'address' => $data['clinic_address']]);

        $employee = new Employee();
        $employee->clinic_id = $clinic->id;
        $employee->name = Input::get('name');
        $employee->password = Hash::make(Input::get('password'));
        $employee->email = Input::get('email');
        $employee->gender = Input::get('gender');
        $employee->age = Input::get('age');
        $employee->city = Input::get('city');
        $employee->country = Input::get('country');
        $employee->address = Input::get('address');

        if(Input::get('phone') == ''){
            $employee->phone = 'N/A';
        }else {
            $employee->phone = Input::get('phone');
        }

        if(Input::get('cnic') == ''){
            $employee->cnic = 'N/A';
        }else {
            $employee->cnic = Input::get('cnic');
        }

        if(Input::get('branch') == ''){
            $employee->branch = 'N/A';
        }else {
            $employee->branch = Input::get('branch');
        }

        if(Input::get('note') == ''){
            $employee->note = 'N/A';
        }else {
            $employee->note = Input::get('note');
        }

        $employee->status = Input::get('status');
        $employee->role = 'Administrator';
        $employee->save();

        $data = ['link' => URL::to('login'), 'name' => Input::get('name')];
//      Send email to employee
        Mail::queue('emails.welcome', $data, function($message)
        {
            $message->to(Input::get('email'), Input::get('name'))->subject('Welcome to EMR!');
        });

        return Redirect::route('clinics.index');
	}

	/**
	 * Display the specified resource.
	 * GET /clinics/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $clinic = Clinic::find($id);
        $admin = Employee::where('role', 'Administrator')->where('clinic_id', $clinic->id)->first();
        return View::make('clinics.show', compact('clinic', 'admin'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /clinics/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$clinic = Clinic::find($id);
        $admin = Employee::where('role', 'Administrator')->where('clinic_id', $clinic->id)->first();
        return View::make('clinics.edit', compact('clinic', 'admin'));
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /clinics/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $data = Input::all();
        $clinic = Clinic::findOrFail($id);
        $admin = Employee::where('role', 'Administrator')->where('clinic_id', $clinic->id)->first();

        if ($data['email'] !== $admin->email) {
            $validator = Validator::make($data, array('email' => 'unique:employees'));

            if ($validator->fails())
            {
                return Redirect::back()->withErrors($validator)->withInput();
            }

        }

        $clinic->update(['name' => $data['clinic_name'], 'address' => $data['clinic_address']]);

        $admin->name = Input::get('name');
        $admin->email = Input::get('email');
        $admin->gender = Input::get('gender');
        $admin->age = Input::get('age');
        $admin->city = Input::get('city');
        $admin->country = Input::get('country');
        $admin->address = Input::get('address');

        if(Input::get('phone') == ''){
            $admin->phone = 'N/A';
        }else {
            $admin->phone = Input::get('phone');
        }

        if(Input::get('cnic') == ''){
            $admin->cnic = 'N/A';
        }else {
            $admin->cnic = Input::get('cnic');
        }

        if(Input::get('branch') == ''){
            $admin->branch = 'N/A';
        }else {
            $admin->branch = Input::get('branch');
        }

        if(Input::get('note') == ''){
            $admin->note = 'N/A';
        }else {
            $admin->note = Input::get('note');
        }

        $admin->status = Input::get('status');
        $admin->update();

        return Redirect::route('clinics.index');
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /clinics/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        Clinic::destroy($id);

        return Redirect::route('clinics.index');
	}

}