@extends('lab.layouts.master')
<!--========================================================
                          TITLE
=========================================================-->
@section('title')
Lab Manager Home
@stop

<!--========================================================
                          CURRENT MENU
=========================================================-->
@section("current_lab_home")
class="current"
@stop

<!--========================================================
                          CONTENT
=========================================================-->
@section('content')
    <section id="content">
        
		<div class = "user_logo">
			<div class="header_1 wrap_3 color_3" style="color: #fff; padding-top: 20px">
                        Lab Manager Home
            </div>
		</div>
		<br><br>
			<div>
				<div class="menu" style="margin-left: 10%; margin-right: 10%">
					<a class="ferozi" href="#">Add Test Results</a>
					<a class="green" href="#">View Test Results</a>
					<a class="pink" href="#">Update Test Results</a>
					<a class="purple" href="#">Print Test Report</a>	
				</div>
			</div>
		
        
@stop