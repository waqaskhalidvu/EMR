@extends('doctor.layouts.master')
<!--========================================================
                          TITLE
=========================================================-->
@section('title')
Doctor Home
@stop

<!--========================================================
                          CURRENT MENU
=========================================================-->
@section("current_doc_home")
class="current"
@stop

<!--========================================================
                          CONTENT
=========================================================-->
@section('content')	
    <section id="content">
        
		<div class = "user_logo">
			<div class="header_1 wrap_3 color_3" style="color: #fff; padding-top: 20px">
                        Doctor Home
            </div>
		</div>
		<br><br>
			<div>
				<div class="menu" style="margin-left: 10%; margin-right: 10%">
					
					<a class="purple" href="search_pmr">View Medical Record</a>
					<a class="blue" href="app_vitals">View Vital Signs</a>
					<a class="orange" href="appointments">View Appointments</a>
					
					
				</div>
			</div>
			
	<!--========================================================
                              Dashboard
    =========================================================-->		
			
			<div class="slideout">
				<input id="dashboard" type="button" value="Dashboard" />
				<div class="emptyDiv">
				<center><b> Hello Doctor to Dashboard!</b></center>
				
				</div> 
            </div>
			
	<!--========================================================
                              End of Dashboard
    =========================================================-->	
	
       <br/><br/><br/><br/><br/><br/><br/><br/>
@stop
