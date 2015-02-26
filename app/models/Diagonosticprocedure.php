<?php

class Diagonosticprocedure extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'procedure_note' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['procedure_note', 'patient_id', 'appointment_id'];

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