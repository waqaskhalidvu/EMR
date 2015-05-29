<?php

class Surgicalhistory extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['surgery_name','surgery_date','surgery_notes', 'patient_id', 'clinic_id'];

    // Relationships
    public function patient()
    {
        return $this->belongsTo('Patient');
    }
}