<?php

class Diagonosticprocedure extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['procedure_note', 'patient_id'];

	// Relationships
	public function patient()
    {
        return $this->belongsTo('Patient');
    }
}