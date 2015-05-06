<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		return Redirect::guest('login');
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() !== Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});


///////////////////////// CUSTOM FILTERS //////////////////////

Route::filter('Doctor', function()
{ 
  if ( Auth::user()->role !== 'Doctor') {
	    if ( Auth::user()->role == 'Administrator'){
	    	return Redirect::to('admin_home'); 
	 	}
	 	else if ( Auth::user()->role == 'Accountant'){
	    	return Redirect::to('accountant_home'); 
	 	}
	 	else if ( Auth::user()->role == 'Lab Manager'){
	    	return Redirect::to('labmanager_home'); 
	 	}
	 	else if ( Auth::user()->role == 'Receptionist'){
	    	return Redirect::to('receptionist_home'); 
	 	}
        else if ( Auth::user()->role == 'Super'){
            return Redirect::to('super_home');
        }
	}else{
		Redirect::to('doctor_home');
	}
});

Route::filter('Super', function()
{
    if ( Auth::user()->role !== 'Super User') {
        if ( Auth::user()->role == 'Doctor'){
            return Redirect::to('doctor_home');
        }
        else if ( Auth::user()->role == 'Accountant'){
            return Redirect::to('accountant_home');
        }
        else if ( Auth::user()->role == 'Lab Manager'){
            return Redirect::to('labmanager_home');
        }
        else if ( Auth::user()->role == 'Receptionist'){
            return Redirect::to('receptionist_home');
        }else if ( Auth::user()->role == 'Administrator'){
            return Redirect::to('admin_home');
        }
    }
});

Route::filter('Administrator', function()
{
    if ( Auth::user()->role !== 'Administrator') {
        if ( Auth::user()->role == 'Doctor'){
            return Redirect::to('doctor_home');
        }
        else if ( Auth::user()->role == 'Accountant'){
            return Redirect::to('accountant_home');
        }
        else if ( Auth::user()->role == 'Lab Manager'){
            return Redirect::to('labmanager_home');
        }
        else if ( Auth::user()->role == 'Receptionist'){
            return Redirect::to('receptionist_home');
        }
        else if ( Auth::user()->role == 'Super'){
            return Redirect::to('super_home');
        }
    }
});

Route::filter('Accountant', function()
{ 
  if ( Auth::user()->role !== 'Accountant') {
    if ( Auth::user()->role == 'Doctor'){
    	return Redirect::to('doctor_home'); 
 	}
 	else if ( Auth::user()->role == 'Administrator'){
    	return Redirect::to('admin_home'); 
 	}
 	else if ( Auth::user()->role == 'Lab Manager'){
    	return Redirect::to('labmanager_home'); 
 	}
 	else if ( Auth::user()->role == 'Receptionist'){
    	return Redirect::to('receptionist_home'); 
 	}
    else if ( Auth::user()->role == 'Super'){
        return Redirect::to('super_home');
    }
}});

Route::filter('Lab', function()
{ 
  if ( Auth::user()->role !== 'Lab Manager') {
    if ( Auth::user()->role == 'Doctor'){
    	return Redirect::to('doctor_home'); 
 	}
 	else if ( Auth::user()->role == 'Administrator'){
    	return Redirect::to('admin_home'); 
 	}
 	else if ( Auth::user()->role == 'Accountant'){
    	return Redirect::to('accountant_home'); 
 	}
 	else if ( Auth::user()->role == 'Receptionist'){
    	return Redirect::to('receptionist_home'); 
 	}
    else if ( Auth::user()->role == 'Super'){
        return Redirect::to('super_home');
    }
}});

Route::filter('Receptionist', function()
{ 
  if ( Auth::user()->role !== 'Receptionist') {
    if ( Auth::user()->role == 'Doctor'){
    	return Redirect::to('doctor_home'); 
 	}
 	else if ( Auth::user()->role == 'Administrator'){
    	return Redirect::to('admin_home'); 
 	}
 	else if ( Auth::user()->role == 'Accountant'){
    	return Redirect::to('accountant_home'); 
 	}
 	else if ( Auth::user()->role == 'Lab Manager'){
    	return Redirect::to('labmanager_home'); 
 	}
    else if ( Auth::user()->role == 'Super'){
        return Redirect::to('super_home');
    }
}});