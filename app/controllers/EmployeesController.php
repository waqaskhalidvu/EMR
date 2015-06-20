<?php

class EmployeesController extends \BaseController {

	/**
	 * Display a listing of employees
	 *
	 * @return Response
	 */
	public function index()
	{
		$employees = Employee::where('clinic_id', Auth::user()->clinic_id)->paginate(10);

		return View::make('employees.index', compact('employees'));
	}

	/**
	 * Show the form for creating a new employee
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('employees.create');
	}

	/**
	 * Store a newly created employee in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $data = Input::all();
        $validator = Validator::make($data, array('password' => 'min:6','email' => 'unique:employees', 'status' => 'required', 'role' => 'required'));

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $employee = new Employee();
        $employee->name = Input::get('name');
        $employee->clinic_id = Auth::user()->clinic_id;
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
        $employee->role = Input::get('role');
        $employee->save();

        $data = ['link' => URL::to('login'), 'name' => Input::get('name')];
//      Send email to employee
        Mail::queue('emails.welcome', $data, function($message)
        {
            $message->to(Input::get('email'), Input::get('name'))->subject('Welcome to EMR!');
        });

		return Redirect::route('employees.index');
	}

	/**
	 * Display the specified employee.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$employee = Employee::findOrFail($id);

		return View::make('employees.show', compact('employee'));
	}

	/**
	 * Show the form for editing the specified employee.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$employee = Employee::find($id);

		return View::make('employees.edit', compact('employee'));
	}

	/**
	 * Update the specified employee in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$employee = Employee::findOrFail($id);

        if (Input::get('email') !== $employee->email) {
            $input = array('email' => Input::get('email'));
            $validator = Validator::make($input, array('email' => 'unique:employees'));

            if ($validator->fails())
            {
                return Redirect::back()->withErrors($validator)->withInput();
            }

        }

        $data = Input::all();
        $validator = Validator::make($data, array('status' => 'required', 'role' => 'required'));

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator)->withInput();
        }

		$employee->update($data);

		return Redirect::route('employees.index');
	}

	/**
	 * Remove the specified employee from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Employee::destroy($id);

		return Redirect::route('employees.index');
	}


    // ========================= User Validation ========================= //
    public function validate()
    {
        $email = Input::get('email');
        $password = Input::get('password');

        if (Auth::attempt(array('email' => $email, 'password' => $password), true))
        {
            if(Auth::user()->status == 'Active' && Auth::user()->role == 'Doctor' && Auth::user()->clinic->admin->status == 'Active'){
                 return Redirect::to('doctor_home');
            }else if(Auth::user()->status == 'Active' && Auth::user()->role == 'Administrator'){
                return Redirect::to('admin_home');
            }
            else if(Auth::user()->status == 'Active' && Auth::user()->role == 'Receptionist' && Auth::user()->clinic->admin->status == 'Active'){
                return Redirect::to('receptionist_home');
            }
            else if(Auth::user()->status == 'Active' && Auth::user()->role == 'Lab Manager' && Auth::user()->clinic->admin->status == 'Active'){
                return Redirect::to('labmanager_home');
            }
            else if(Auth::user()->status == 'Active' && Auth::user()->role == 'Accountant' && Auth::user()->clinic->admin->status == 'Active'){
                return Redirect::to('accountant_home');
            }
            else if(Auth::user()->status == 'Active' && Auth::user()->role == 'Super User'){
                return Redirect::to('super_home');
            }else{
                return View::make('login')->withErrors('You are not Activated!');
                Auth::logout();
            }

        }else{
            $validator = Validator::make(Input::all(), array('email' => 'exists:employees', 'password' => 'exists:employees'));
            if ($validator->fails())
            {
                Auth::logout();
                return View::make('login')->withErrors($validator);
            }
        }

    }
}
