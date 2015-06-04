<?php

class Clinic extends \Eloquent {
	protected $fillable = ['name', 'address', 'is_activated'];

    public function employees(){
        return $this->hasMany('employees');
    }

    public function admin(){
        return $this->hasOne('Employee')->where('role', 'Administrator');
    }
}