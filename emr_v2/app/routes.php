<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

Route::get('/login', 'HomeController@showLogin');

Route::get('/about', 'HomeController@showAbout');

Route::get('/services', 'HomeController@showServices');

Route::get('/contacts', 'HomeController@showContacts');

Route::get('/doctor_home', 'HomeController@showDoctor_home');

Route::get('/receptionist_home', 'HomeController@showReceptionist_home');

Route::get('/labmanager_home', 'HomeController@showLabmanager_home');

Route::get('/accountant_home', 'HomeController@showAccountant_home');

Route::get('/admin_home', 'HomeController@showAdmin_home');

Route::get('/register_user', 'HomeController@showUserRegistrationForm');

Route::get('/search_pmr', 'HomeController@showSearchPMR');

Route::get('/view_pmr', 'HomeController@showViewPMR');

Route::get('/index', 'HomeController@showIndex');