<?php

use Illuminate\Http\JsonResponse;

class TimeslotsController extends \BaseController {

	/**
	 * Display a listing of timeslots
	 *
	 * @return Response
	 */
	public function index()
	{
		$timeslots = Timeslot::where('clinic_id', Auth::user()->clinic_id)->get();

		return View::make('timeslots.index', compact('timeslots'));
	}

	/**
	 * Show the form for creating a new timeslot
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('timeslots.create');
	}

	/**
	 * Store a newly created timeslot in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Timeslot::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        $data['clinic_id'] = Auth::user()->clinic_id;
		Timeslot::create($data);

		return Redirect::route('timeslots.index');
	}

	/**
	 * Display the specified timeslot.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$timeslot = Timeslot::findOrFail($id);

		return View::make('timeslots.show', compact('timeslot'));
	}

	/**
	 * Show the form for editing the specified timeslot.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$timeslot = Timeslot::find($id);

		return View::make('timeslots.edit', compact('timeslot'));
	}

	/**
	 * Update the specified timeslot in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$timeslot = Timeslot::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Timeslot::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$timeslot->update($data);

		return Redirect::route('timeslots.index');
	}

	/**
	 * Remove the specified timeslot from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Timeslot::destroy($id);

		return Redirect::route('timeslots.index');
	}

    //    Return Free slots to Appointment creation form
    public function getFreeSlots(){
        $id = Input::get('id');                 // Get Employee id
        $date = Input::get('date');             // Get selected date
        $day = date('l', strtotime($date));     // Get day name from date

        $duty_day = Dutyday::where('employee_id', $id)->where('day', $day)
                    ->get()->first();

        if($duty_day) {
            $slot = null;
            $appointments = Appointment::where('date', $date)->where('employee_id', $id)
                            ->get();
            if(count($appointments) > 0){
                $timeslots = Timeslot::where('dutyday_id', $duty_day->id)
                    ->where('employee_id', $id);
                foreach($appointments as $appointment){
                    $slot = $timeslots->where('slot', '!=', $appointment->time)
                            ->get()->toJson();
                }
            }else{
                $slot = Timeslot::where('dutyday_id', $duty_day->id)
                        ->get()->toJson();
            }

            return JsonResponse::create($slot);
        }
        return 'false';
    }

}
