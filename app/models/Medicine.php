<?php

class Medicine extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		 'name' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['name', 'quantity', 'description', 'clinic_id'];

}