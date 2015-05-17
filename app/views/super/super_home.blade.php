@extends('super.layouts.master')
<!--========================================================
                          TITLE
=========================================================-->
@section('title')
Super User Home
@stop

<!--========================================================
                          CURRENT MENU
=========================================================-->
@section("current_super_home")
class="current"
@stop

<!--========================================================
                          CONTENT
=========================================================-->
@section('content')
    <section id="content">

		<div class = "user_logo">
			<div class="header_1 wrap_3 color_3" style="color: #fff; padding-top: 20px">
                        Super User Home
            </div>
		</div>
		<br>
			<div>
				<div class="menu" style="margin-left: 10%; margin-right: 10%">
					<a class="ferozi" href="clinics">Manage Clinics</a>

				</div>
			</div>


@stop