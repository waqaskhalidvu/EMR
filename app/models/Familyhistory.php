<?php

class Familyhistory extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required| '
	];

	// Don't forget to fill this array
	protected $fillable = ['f_member_name','patient_relation','gender','age',
        'diesease_note', 'patient_id', 'clinic_id'];

    // Relationships
    public function patient()
    {
        return $this->belongsTo('Patient');
    }
}