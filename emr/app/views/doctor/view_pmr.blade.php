@extends('doctor.layouts.main')
<!--========================================================
                          TITLE
=========================================================-->
@section('title')
View PMR
@stop

<!--========================================================
                          CURRENT MENU
=========================================================-->
@section("current_view_pmr")
class="current"
@stop


<!--========================================================
                          CONTENT
=========================================================-->
@section('content')

    <section id="content">
        
		<div class = "user_logo">
			<div class="header_1 wrap_3 color_3" style="color: #fff; padding-top: 20px">
                        View Patient Medical Record
            </div>
		</div>
		<br><br>
        <div>
                <div class="menu" style="margin-left: 10%; margin-right: 10%">
                    <a class="ferozi" href="">Demographics</a>
                    <a class="green" href="#">Prescription</a>
                    <a class="pink" href="#">Vital Signs</a>
                    <a class="purple" href="#">Family History</a>
                    <a class="blue" href="#">Surgical History</a>
                    <a class="orange" href="#">Previous Diseases</a>
                    <a class="ferozi" href="#">Drug Usage</a>
                    <a class="green" href="#">Allergies</a>
                    <a class="pink" href="#">Temporary Medication</a>
                    <a class="purple" href="#" >Permanent Medication </a>
                    <a class="blue" href="#">Diagnostic Procedure</a>
                    <a class="orange" href="#">Lab Test Reports</a>
                    
                </div>
            </div>


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

