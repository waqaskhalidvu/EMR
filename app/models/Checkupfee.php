<?php

class Checkupfee extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'checkup_fee' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['checkup_fee', 'fee_note', 'patient_id', 'appointment_id', 'clinic_id'];

	// Relationships
    public function patient()
    {
        return $this->belongsTo('Patient');
    }

	public function appointment()
    {
        return $this->belongsTo('Appointment');
    }

}