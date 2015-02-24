@extends('accountant.layouts.master')
<!--========================================================
                          TITLE
=========================================================-->
@section('title')
Accountant Home
@stop

<!--========================================================
                          CURRENT MENU
=========================================================-->
@section("current_acc_home")
class="current"
@stop

    <!--========================================================
                              CONTENT
    =========================================================-->
@section('content')
    <section id="content">
        
		<div class = "user_logo">
			<div class="header_1 wrap_3 color_3" style="color: #fff; padding-top: 20px">
                        Accountant Home
            </div>
		</div>
		<br/>
			<div>
				<div class="menu" style="margin-left: 10%; margin-right: 10%">
					<a class="ferozi" href="#">Add Checkup Fee</a>
					<a class="green" href="#">Edit Checkup Fee</a>
					<a class="pink" href="#">View Checkup Fee</a>
					<a class="purple" href="#">Print Checkup Invoice</a>
					<a class="blue" href="#">Add Lab Test Fee</a>
					<a class="orange" href="#">Edit Lab Test Fee</a>
					<a class="ferozi" href="#">View Lab Test Fee</a>
					<a class="green" href="#">Print Test Invoice</a>	
				</div>
			</div>

        
@stop
