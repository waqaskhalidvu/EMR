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
	protected $fillable = ['weight', 'weight_unit', 'height', 'height_unit', 'bp_systolic', 'bp_systolic_unit', 'bp_diastolic', 'bp_diastolic_unit', 'blood_group', 'pulse_rate', 'pulse_rate_unit', 'respiration_rate', 'respiration_rate_unit', 'temprature', 'temprature_unit', 'note', 'patient_id', 'appointment_id'];

	public function patient()
    {
        return $this->belongsTo('Patient', 'patient_id');
    }

    public function appointment()
    {
        return $this->belongsTo('Appointment');
    }
}