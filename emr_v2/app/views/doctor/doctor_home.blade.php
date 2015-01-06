@extends('doctor.layouts.main')
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
					<a class="blue" href="#">View Current Vitals</a>
					<a class="orange" href="#">View Appointments</a>
					
					
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
	
        <div class="container">
            <div class="row wrap_9 wrap_4 wrap_10">
                <div style="margin-top: 100px" class="grid_12">
                    <div class="header_1 wrap_3 color_3">
                        Get in Touch
                    </div>
                    <div class="box_3">
                        <ul class="list_1">
                            <li><a class="fa fa-twitter" href="#"></a></li>
                            <li><a class="fa fa-facebook" href="#"></a></li>
                            <li><a class="fa fa-google-plus" href="#"></a></li>
                            <li><a class="fa fa-pinterest" href="#"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop
