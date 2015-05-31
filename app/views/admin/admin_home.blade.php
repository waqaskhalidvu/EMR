@extends('admin.layouts.master')
<!--========================================================
                          TITLE
=========================================================-->
@section('title')
Administrator Home
@stop

<!--========================================================
                          CURRENT MENU
=========================================================-->
@section("current_admin_home")
class="current"
@stop

<!--========================================================
                          CONTENT-1
=========================================================-->
@section('content1')
	
    <section id="content">
        
		<div class = "user_logo">
			<div class="header_1 wrap_3 color_3" style="color: #fff; padding-top: 20px">
                        Administrator Home
            </div>
		</div>
@stop

<!---------------- Breadcrumbs ------------------>
{{--@section('breadcrumbs')--}}
    {{----}}
    {{--<div class="breadcrumb flat">--}}
      {{--<a href="admin_home" class="active">Home</a>--}}
      {{--<!-- <a href="#">Unused</a>--}}
      {{--<a href="#">Unused</a>--}}
      {{--<a href="#">Unused</a> -->--}}
    {{--</div>--}}
    {{----}}
{{--@stop--}}
<!---------------End of Breadcrumbs -------------->


@section('content2')		
			<div>
				<div class="menu" style="margin-left: 10%; margin-right: 10%">
					<a class="ferozi" href="employees">Manage Employees</a>
					<a class="blue" href="appointments">Manage Appointments</a>
					<a class="purple" href="dutydays">Doctor Schedules </a>
					<a class="orange" href="patients" >Manage Patients </a>
					<a class="pink" href="search_pmr">Manage Medical Record</a>
					<a class="green" href="app_vitals">Add Vital Signs</a>
					<a class="ferozi" href="app_prescription">Prepare Prescription</a>
					{{--<a class="green" href="app_proc"> Diagnostic Procedures	</a>--}}
					<a class="blue" href="app_pres_print" >Print Prescription </a>
					<a class="purple" href="app_tests">Manage Test Reports</a>
					<a class="orange" href="app_test_print">Print Test Report</a>
  					<a class="pink" href="app_check_fee">Add Checkup Fee</a>
					<a class="green" href="app_checkup_fee_print">Print Checkup Invoice</a>
					<a class="ferozi" href="app_test_fee" >Add Lab Test Fee </a>
					<a class="blue" href="app_test_fee_print">Print Test Invoice</a>
					<a class="orange" href="medicines" >Manage Medicines </a>
					<a class="orange" href="patients_reporting" >View Checked Patients</a>
				</div>
			</div>

@stop