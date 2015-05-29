<?php

class Labtest extends \Eloquent {

	// Add your validation rules here
	public static $rules = [

		'test_name' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['test_name', 'test_description', 'test_results', 'total_fee',
        'patient_id', 'appointment_id', 'clinic_id'];

	public function patient()
    {
        return $this->belongsTo('Patient');
    }

    public function appointment()
    {
        return $this->belongsTo('Appointment');
    }

}