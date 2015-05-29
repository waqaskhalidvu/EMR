<?php

class Timeslot extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['slot', 'reserved', 'dutyday_id', 'employee_id', 'clinic_id'];

    // Relationships
    public function dutyday()
    {
        return $this->belongsTo('Dutyday');
    }

    public function appointments()
    {
        return $this->hasMany('Appointment', 'timeslot_id', 'id');
    }
}