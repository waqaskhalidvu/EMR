<?php

class Appointment extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['checkup_reason', 'time', 'date', 'status', 'checkup_fee', 'fee_note',
    'timeslot_id', 'patient_id', 'employee_id'];

    // Relationships
    public function patient()
    {
        return $this->belongsTo('Patient');
    }

    public function employee()
    {
        return $this->belongsTo('Employee');
    }

    public function prescription()
    {
        return $this->hasOne('Prescription');
    }

    public function timeslot()
    {
        return $this->belongsTo('Timeslot');
    }

    public function vitalsign()
    {
        return $this->hasOne('Vitalsign');
    }

    public function labtests()
    {
        return $this->hasMany('Labtest');
    }
}