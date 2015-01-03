@extends('admin.layouts.main')
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
@section('breadcrumbs')
    
    <div class="breadcrumb flat">
      <a href="admin_home" class="active">Home</a>
      <!-- <a href="#">Unused</a>
      <a href="#">Unused</a>
      <a href="#">Unused</a> -->
    </div>
    
@stop
<!---------------End of Breadcrumbs -------------->


@section('content2')		
			<div>
				<div class="menu" style="margin-left: 10%; margin-right: 10%">
					<a class="ferozi" href="register_user">Register User</a>
					<a class="green" href="#">Edit User</a>
					<a class="pink" href="#">View User</a>
					<a class="purple" href="#">Reserve Appointment</a>
					<a class="blue" href="#">View Appointment</a>
					<a class="orange" href="#">Edit Appointment</a>
					<a class="ferozi" href="#">Create Doctor Schedule</a>
					<a class="green" href="#">View Doctor Schedule</a>
					<a class="pink" href="#">Edit Doctor Schedule</a>
					<a class="purple" href="#" >Register New Patient </a>
					<a class="blue" href="#">View Patient</a>
					<a class="orange" href="#">Edit Patient</a>
					<a class="ferozi" href="#">Manage Medical Record</a>
					<a class="purple" href="#">Add Current Vitals</a>
					<a class="blue" href="#">Prepare Prescription</a>
					<a class="orange" href="#" >Print Prescription </a>
					<a class="green" href="#">Add Test Results</a>
					<a class="pink" href="#">View Test Results</a>
					<a class="purple" href="#" >Update Test Results </a>
					<a class="blue" href="#">Print Test Report</a>
					<a class="orange" href="#">Add Checkup Fee</a>
					<a class="ferozi" href="#">Edit Checkup Fee</a>
					<a class="green" href="#">View Checkup Fee</a>
					<a class="pink" href="#">Print Checkup Invoice</a>
					<a class="purple" href="#" >Add Lab Test Fee </a>
					<a class="blue" href="#">View Lab Test Fee</a>
					<a class="orange" href="#">Edit Lab Test Fee</a>
					<a class="ferozi" href="#">Print Test Invoice</a>
				</div>
			</div>
		
        <div class="container">
            <div class="row wrap_9 wrap_4 wrap_10">
                <div class="grid_12">
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