<?php

class TestfeesController extends \BaseController {

	/**
	 * Display a listing of testfees
	 *
	 * @return Response
	 */
	public function index()
	{
		$testfees = Testfee::where('clinic_id', Auth::user()->clinic_id)->get();

		return View::make('testfees.index', compact('testfees'));
	}

	/**
	 * Show the form for creating a new testfee
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('testfees.create');
	}

	/**
	 * Store a newly created testfee in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Testfee::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        $data['clinic_id'] = Auth::user()->clinic_id;
		Testfee::create($data);

		return Redirect::route('testfees.index');
	}

	/**
	 * Display the specified testfee.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$testfee = Testfee::findOrFail($id);

		return View::make('testfees.show', compact('testfee'));
	}

	/**
	 * Show the form for editing the specified testfee.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$testfee = Testfee::find($id);

		return View::make('testfees.edit', compact('testfee'));
	}

	/**
	 * Update the specified testfee in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$testfee = Testfee::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Testfee::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$testfee->update($data);

		return Redirect::route('testfees.index');
	}

	/**
	 * Remove the specified testfee from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Testfee::destroy($id);

		return Redirect::route('testfees.index');
	}

}
