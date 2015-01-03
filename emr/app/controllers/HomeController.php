<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showLogin()
	{
		return View::make('login');
	}

	public function showAbout()
	{
		return View::make('about');
	}
	public function showServices()
	{
		return View::make('services');
	}

	public function showContacts()
	{
		return View::make('contacts');
	}

	public function showDoctor_home()
	{
		return View::make('doctor.doctor_home');
	}

	public function showReceptionist_home()
	{
		return View::make('receptionist.receptionist_home');
	}

	public function showLabmanager_home()
	{
		return View::make('lab.labmanager_home');
	}

	public function showAccountant_home()
	{
		return View::make('accountant.accountant_home');
	}

	public function showAdmin_home()
	{
		return View::make('admin.admin_home');
	}

	public function showUserRegistrationForm(){

		return View::make('admin.register_user');
	}

	public function showSearchPMR(){

		return View::make('doctor.search_pmr');
	}

	public function showViewPMR(){

		return View::make('doctor.view_pmr');
	}

	public function showIndex()
	{
		return View::make('index');
	}
}
