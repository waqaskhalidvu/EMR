<?php

class LabtestsController extends \BaseController {

	/**
	 * Display a listing of labtests
	 *
	 * @return Response
	 */
	public function index()
	{
		$appointment = Appointment::find(Input::get('id'));
        $labtests = $appointment->labtests()->paginate(10);

		if(Input::get('flag') != null){
            if(Input::get('flag') == 'print'){
                $flag = Input::get('flag');
                return View::make('labtests.index', compact('appointment', 'flag', 'labtests'));
            }else{
                $flag = Input::get('flag');
                return View::make('labtests.index', compact('appointment', 'flag', 'labtests'));
            }
		}
        return View::make('labtests.index', compact('appointment', 'labtests'));
	}

	/**
	 * Show the form for creating a new labtest
	 *
	 * @return Response
	 */
	public function create()
	{
		$appointment = Appointment::find(Input::get('id'));
        return View::make('labtests.create', compact('appointment'));
	}

	/**
	 * Store a newly created labtest in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Labtest::$rules);

		if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $data['clinic_id'] = Auth::user()->clinic_id;
		Labtest::create($data);

        return Redirect::to('labtests?id='.$data['appointment_id']);
	}

	/**
	 * Display the specified labtest.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$labtest = Labtest::findOrFail($id);
		
		if(Input::get('flag') != null){
			$flag = Input::get('flag');
			return View::make('labtests.show', compact('labtest', 'flag'));
		}

		return View::make('labtests.show', compact('labtest'));
	}

	/**
	 * Show the form for editing the specified labtest.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$labtest = Labtest::find($id);
		
		if(Input::get('flag') != null){
			$flag = Input::get('flag');
			return View::make('labtests.edit', compact('labtest', 'flag'));
		}
		
		return View::make('labtests.edit', compact('labtest'));
	}

	/**
	 * Update the specified labtest in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$labtest = Labtest::findOrFail($id);
        $data = Input::all();
        if(Input::get('flag') != null){
            $data['test_name'] = $labtest->test_name;
            $data['test_results'] = $labtest->test_results;
        }

        if(Auth::user()->role == 'Lab Manager'){
            $data['test_name'] = $labtest->test_name;
        }

		$validator = Validator::make($data, Labtest::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        $data['patient_id'] = $labtest->patient_id;
        $labtest->update($data);
		
		if(Input::get('flag') != null){
			$flag = Input::get('flag');
			return Redirect::to('labtests?id='.$data['appointment_id']. '&flag='. $flag);
		}

        return Redirect::to('labtests?id='.$data['appointment_id']);
	}

	/**
	 * Remove the specified labtest from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Labtest::destroy($id);

		return Redirect::route('labtests.index');
	}

}
