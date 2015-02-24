@extends('receptionist.layouts.master')
<!--========================================================
                          TITLE
=========================================================-->
@section('title')
Services
@stop

<!--========================================================
                          CURRENT MENU
=========================================================-->
@section("current_services")
class="current"
@stop

<!--========================================================
                          CONTENT
=========================================================-->
@section('content')
<section id="content"><div class="ic">More Website Templates @ TemplateMonster.com - September08, 2014!</div>
    <div class="container">
        <div class="row wrap_11 wrap_20">
            <div class="grid_12">
                <div class="text_7 color_2">
                    Categories:
                    <ul id="filters">
                        <li><a href="#" data-filter="*">Show All</a></li>
                        <li><a href="#" data-filter="c1">Administration</a></li>
                        <li><a href="#" data-filter="c2">Patient Services</a></li>
                        <li><a href="#" data-filter="c3">Patient Data</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="bg_1 wrap_17">
        <div class="container">
            <div class="row">
                <div class="grid_12">
                    <div class="isotope row">
                        <div class="element-item grid_4 c1">
                            <div class="box_7">
                                <div class="img-wrap">
                                    <img src="images/admin.jpg" alt="Image 1"/>
                                </div>
                                <div class="caption">
                                    <h3 class="text_2 color_2"><a href="#">Clinic Administration</a></h3>
                                    <p class="text_3" style="text-align: justify;">
                                        Now Administrator of the Clinic can manage all tasks with greater ease on a
                                        single click including Employees' Management and all of their functionalities.
                                    </p>
                                    <a class="btn_2" href="#">read more</a></div>
                            </div>
                        </div>
                        <div class="element-item grid_4 c2">
                            <div class="box_7">
                                <div class="img-wrap">
                                    <img src="images/billing.jpg" alt="Image 6"/>
                                </div>
                                <div class="caption">
                                    <h3 class="text_2 color_2"><a href="#">Patient Billing</a></h3>
                                    <p class="text_3" style="text-align: justify;">
                                        Now Accountant can prepare bills regarding check-up and lab tests online,
                                        using Billing service of our application. Also Accountant can print billing
                                        invoices for patients.

                                    </p>
                                    <a class="btn_2" href="#">read more</a></div>

                            </div>
                        </div>
                        <div class="element-item grid_4 c2">
                            <div class="box_7">
                                <div class="img-wrap">
                                    <img src="images/test.jpg" alt="Image 3"/>
                                </div>
                                <div class="caption">
                                    <h3 class="text_2 color_2"><a href="#">Lab Test's Management</a></h3>
                                    <p class="text_3" style="text-align: justify;">
                                        With our Lab Test management service, Lab Assistants can maintain Test Reports
                                        of Patients Online. Lab Assistants can also generate printed Test Reports for patients.
                                    </p>
                                    <a class="btn_2" href="#">read more</a></div>
                            </div>
                        </div>
                        <div class="element-item grid_4 c2">
                            <div class="box_7">
                                <div class="img-wrap">
                                    <img src="images/index-2_img04.jpg" alt="Image 4"/>
                                </div>
                                <div class="caption">
                                    <h3 class="text_2 color_2"><a href="#">Appointment Reservation</a></h3>
                                    <p class="text_3" style="text-align: justify;">
                                        Now Receptionists can reserve appointments for patients with greater ease,
                                        without loosing any details regarding appointment using our Online Appointment Reservation service.
                                    </p>
                                    <a class="btn_2" href="#">read more</a></div>
                            </div>
                        </div>
                        <div class="element-item grid_4 c3">
                            <div class="box_7">
                                <div class="img-wrap">
                                    <img src="images/pmr.jpg" alt="Image 5"/>
                                </div>
                                <div class="caption">
                                    <h3 class="text_2 color_2"><a href="#">Patient Medical Records</a></h3>
                                    <p class="text_3" style="text-align: justify;">
                                        The most important service provided by our application is to enhance analysis
                                        process of patients for doctors by maintining medical records of patients online. 
                                    </p>
                                    <a class="btn_2" href="#">read more</a></div>
                            </div>
                        </div>
                        <div class="element-item grid_4 c3">
                            <div class="box_7">
                                    <div class="img-wrap">
                                        <img src="images/branches.jpg" alt="Image 2"/>
                                    </div>
                                    <div class="caption">
                                        <h3 class="text_2 color_2"><a href="#">Patient Data across Branches</a></h3>
                                        <p class="text_3" style="text-align: justify;">
                                            Now you can share all of your patient's records across multiple branches of a
                                            Clinic. Patient records will be available at all branches with most recent updates.
                                        </p>
                                        <a class="btn_2" href="#">read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
@stop