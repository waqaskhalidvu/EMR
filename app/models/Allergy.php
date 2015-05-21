<?php

class Allergy extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['allergy_name','allergy_note', 'patient_id', 'clinic_id'];

    // Relationships
    public function patient()
    {
        return $this->belongsTo('Patient');
    }
}