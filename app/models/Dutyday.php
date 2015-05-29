<?php

class Dutyday extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['day', 'start', 'end', 'employee_id', 'clinic_id'];

    public static function makeSlots($start_time, $end_time, $day_id, $emp_id){
        $fifteen_mins  = 15 * 60;
        $start = strtotime($start_time);
        $end = strtotime($end_time);

        while($start <= $end){
            $timeslot = new Timeslot();
            $timeslot->slot = date("H:i:s", $start);
            $timeslot->save();
            $timeslot->dutyday_id = $day_id;
            $timeslot->save();
            $timeslot->employee_id = $emp_id;
            $timeslot->save();
            $start += $fifteen_mins;
        }
    }

    public static function updateSlots($start_time, $end_time, $day_id){
        $fifteen_mins  = 15 * 60;
        $start = strtotime($start_time);
        $end = strtotime($end_time);

        Timeslot::where('dutyday_id', '=', $day_id)->delete();

        while($start <= $end){
            $timeslot = new Timeslot();
            $timeslot->slot = date("H:i:s", $start);
            $timeslot->save();
            $timeslot->dutyday_id = $day_id;
            $timeslot->save();
            $start += $fifteen_mins;
        }
    }

	// Relationships
	public function employee()
    {
        return $this->belongsTo('Employee');
    }

    public function timeslots()
    {
        return $this->hasMany('Timeslot');
    }
}