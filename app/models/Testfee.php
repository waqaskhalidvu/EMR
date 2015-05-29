<?php

class Testfee extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'test_fee' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['test_fee', 'fee_note', 'clinic_id'];

}