<?php

class WorkingdaysController extends \BaseController {

	/**
	 * Display a listing of workingdays
	 *
	 * @return Response
	 */
	public function index()
    {
        $doctors = Employee::has('workingdays')->get();
		return View::make('workingdays.index', compact('doctors'));
	}

	/**
	 * Show the form for creating a new workingday
	 *
	 * @return Response
	 */
	public function create()
	{
        $doctors = Employee::has('workingdays', '=', 0)->where('role', 'Doctor')->get();
        return View::make('workingdays.create', compact('doctors'));
	}

	/**
	 * Store a newly created workingday in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Workingday::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        if(Input::get('Sunday') != null){
            $schedule = new Workingday();
            $schedule->employee_id = Input::get('employee_id');
            $schedule->save();
            $schedule->day_name = (Input::get('Sunday'));
            $schedule->save();
            $schedule->start_time = (Input::get('sun_start_time'));
            $schedule->save();
            $schedule->end_time = (Input::get('sun_end_time'));
            $schedule->save();
        }

        if(Input::get('Monday') != null){
            $schedule = new Workingday();
            $schedule->employee_id = Input::get('employee_id');
            $schedule->save();
            $schedule->day_name = (Input::get('Monday'));
            $schedule->save();
            $schedule->start_time = (Input::get('mon_start_time'));
            $schedule->save();
            $schedule->end_time = (Input::get('mon_end_time'));
            $schedule->save();
        }

        if(Input::get('Tuesday') != null){
            $schedule = new Workingday();
            $schedule->employee_id = Input::get('employee_id');
            $schedule->save();
            $schedule->day_name = (Input::get('Tuesday'));
            $schedule->save();
            $schedule->start_time = (Input::get('tue_start_time'));
            $schedule->save();
            $schedule->end_time = (Input::get('tue_end_time'));
            $schedule->save();
        }

        if(Input::get('Wednesday') != null){
            $schedule = new Workingday();
            $schedule->employee_id = Input::get('employee_id');
            $schedule->save();
            $schedule->day_name = (Input::get('Wednesday'));
            $schedule->save();
            $schedule->start_time = (Input::get('wed_start_time'));
            $schedule->save();
            $schedule->end_time = (Input::get('wed_end_time'));
            $schedule->save();
        }

        if(Input::get('Thursday') != null){
            $schedule = new Workingday();
            $schedule->employee_id = Input::get('employee_id');
            $schedule->save();
            $schedule->day_name = (Input::get('Thursday'));
            $schedule->save();
            $schedule->start_time = (Input::get('thu_start_time'));
            $schedule->save();
            $schedule->end_time = (Input::get('thu_end_time'));
            $schedule->save();
        }

        if(Input::get('Friday') != null){
            $schedule = new Workingday();
            $schedule->employee_id = Input::get('employee_id');
            $schedule->save();
            $schedule->day_name = (Input::get('Friday'));
            $schedule->save();
            $schedule->start_time = (Input::get('fri_start_time'));
            $schedule->save();
            $schedule->end_time = (Input::get('fri_end_time'));
            $schedule->save();
        }

        if(Input::get('Saturday') != null){
            $schedule = new Workingday();
            $schedule->employee_id = Input::get('employee_id');
            $schedule->save();
            $schedule->day_name = (Input::get('Saturday'));
            $schedule->save();
            $schedule->start_time = (Input::get('sat_start_time'));
            $schedule->save();
            $schedule->end_time = (Input::get('sat_end_time'));
            $schedule->save();
        }

		return Redirect::route('workingdays.index');
	}

	/**
	 * Display the specified workingday.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// $workingday = Workingday::findOrFail($id);

//		return View::make('workingdays.show', compact('workingday'));

        return View::make('workingdays.show');
	}

	/**
	 * Show the form for editing the specified workingday.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$workingdays = Workingday::where('employee_id', $id);
		$doctor = Employee::where('id', $id);

		return View::make('workingdays.edit', compact('workingdays', 'doctor'));
	}

	/**
	 * Update the specified workingday in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$workingday = Workingday::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Workingday::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$workingday->update($data);

		return Redirect::route('workingdays.index');
	}

	/**
	 * Remove the specified workingday from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Workingday::destroy($id);

		return Redirect::route('workingdays.index');
	}

}
