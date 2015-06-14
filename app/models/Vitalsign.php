<?php

class Vitalsign extends \Eloquent {

	// Add your validation rules here
	public static $rules = [

		'weight' => 'required',
		'height' => 'required',
		'bp_systolic' => 'required',
		'bp_diastolic' => 'required',
		'pulse_rate' => 'required',
		'respiration_rate' => 'required',
		'temprature' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['weight', 'height', 'bp_systolic', 'bp_diastolic', 'blood_group',
        'pulse_rate', 'respiration_rate', 'temprature', 'note', 'patient_id',
        'appointment_id', 'clinic_id'];

	public function patient()
    {
        return $this->belongsTo('Patient', 'patient_id');
    }

    public function appointment()
    {
        return $this->belongsTo('Appointment');
    }
}