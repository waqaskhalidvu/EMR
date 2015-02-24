@extends('accountant.layouts.master')

<!--========================================================
                          TITLE
=========================================================-->
@section('title')
About
@stop

<!--========================================================
                          CURRENT MENU
=========================================================-->
@section("current_about")
class="current"
@stop

<!--========================================================
                          CONTENT
=========================================================-->

@section('content')
<section id="content">
<div class="container">
    <div class="row wrap_11 wrap_12">
        <div class="grid_7">
            <h2 class="header_2 indent_1">About the EMR</h2>
            <div class="box_4">
                <p class="text_3" style="text-align: justify;">
                    Electronic Medical Records is a fully funcitonal service providor system, 
                    that is commited to the actual needs of the Clinics.
                    We offer services for five kinds of Users in Clinic i.e. "Doctors, Receptionists,
                    Lab Assistants, Accountants and Administrator" so that they can perform their
                    daily tasks effectively and conviniently. By providing these services to each
                    User we try to overcome difficulty of your daily intensive tasks in Clinics.
                </p>
            </br>
                <a href="#" class="btn_2">read more</a>
            </div>
        </div>
        <div class="grid_5">
            <div class="img-wrap">
                <img data-src="/images/about_1.jpg" class="img_1" src="/images/preloader.gif" alt="Image 1"/>
                <img data-src="/images/about_2.jpg" class="img_1" src="/images/preloader.gif" alt="Image 2"/>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

<!-- ================================ OUR STAFF (START) =========================== -->
<!-- <div class="bg_1 wrap_13 wrap_10">
    <div class="container">
        <div class="row">
            <div class="grid_12">
                <h2 class="header_2 indent_2">
                    Our Staff
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="grid_6">
                <div class="box_4">
                    <p class="text_5">
                        Kivamus at magna non nunc tristique rhoncus. Aliquam nibh ante, egestas id
                        dictum ai commodo luctus libero. Praesent faucibus malesuada faucibus. Donec laoreet
                        metus
                        id laoreet malesuada. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam
                        consectetur orci sed nulla facilisis consequat. Curabitur vel lorem sit amet nulla
                        ullamcorper fermentum. In vitae varius augue, eu consectetur
                    </p>
                    <div class="row">
                        <div class="grid_2">
                            <ul class="list_2 text_6">
                                <li><a href="#">Helen Tompson</a></li>
                                <li><a href="#">Sandra Hullock</a></li>
                                <li><a href="#">Jessica Ariston</a></li>
                            </ul>
                        </div>
                        <div class="grid_2">
                            <ul class="list_2 text_6">
                                <li><a href="#">Max Grey</a></li>
                                <li><a href="#">Anete Puga</a></li>
                                <li><a href="#">Kevin Wood</a></li>
                            </ul>
                        </div>
                    </div>
                    <a class="btn_3" href="#">view all</a>
                </div>
            </div>
            <div class="grid_6">
                <div class="img-wrap">
                    <img class="img_2" src="images/index-1_img03.jpg" alt="Image 3"/>
                    <img class="img_2" src="images/index-1_img04.jpg" alt="Image 4"/>
                    <img class="img_2" src="images/index-1_img05.jpg" alt="Image 5"/>
                    <img class="img_2" src="images/index-1_img06.jpg" alt="Image 6"/>
                    <img class="img_2" src="images/index-1_img07.jpg" alt="Image 7"/>
                    <img class="img_2" src="images/index-1_img08.jpg" alt="Image 8"/>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div> -->
<!-- ================================ OUR STAFF (END) =========================== -->

<div class="container">
    <div class="row wrap_14">
        <div class="grid_12">
            <h2 class="header_1 wrap_8 color_3">
                Why us
            </h2>
        </div>
    </div>
    <div class="row wrap_15">
        <div class="grid_4">
            <div class="box_5" data-index="1">
                <h3 class="text_2 color_2"><a href="#">Data across Branches</a></h3>
                <p class="text_3" style="text-align: justify;">
                    The main advantage of using this application is that you can save
                    and share your data across multiple branches (if any). You don't need
                    to transfer any data manually or through Emails anymore.
                </p>
            </div>
        </div>
        <div class="grid_4">
            <div class="box_5" data-index="2">
                <h3 class="text_2 color_2"><a href="#">Online Medical Record</a></h3>
                <p class="text_3" style="text-align: justify;">
                    Now you can manage medical records of patients online anywhere and
                    anytime. Doctors can analyze their patients at any time just by login
                    the Application.
                </p>
            </div>
        </div>
        <div class="grid_4">
            <div class="box_5" data-index="3">
                <h3 class="text_2 color_2"><a href="#">Easy Administration</a></h3>
                <p class="text_3" style="text-align: justify;">
                    Now Administrator of Clinic can manage all tasks including tasks of all 
                    users with greater ease. Employees' management becomes much convinient now and
                    on minimum clicks.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- ================================ OUR CLIENTS (START) =========================== -->

<!-- <div class="bg_1 wrap_16 wrap_10">
    <div class="container">
        <div class="row">
            <div class="grid_12">
                <h2 class="header_1 indent_2 color_3">
                    Our Clients
                </h2>
                <div id="owl_2">
                    <div class="item">
                        <div class="row">
                            <div class="preffix_1 grid_10">
                                <ul class="list_3">
                                    <li><a href="#"><img src="images/index-1_img09.jpg" alt="Image 9"/></a></li>
                                    <li><a href="#"><img src="images/index-1_img10.jpg" alt="Image 10"/></a></li>
                                    <li><a href="#"><img src="images/index-1_img11.jpg" alt="Image 11"/></a></li>
                                    <li><a href="#"><img src="images/index-1_img12.jpg" alt="Image 12"/></a></li>
                                    <li><a href="#"><img src="images/index-1_img13.jpg" alt="Image 13"/></a></li>
                                    <li><a href="#"><img src="images/index-1_img14.jpg" alt="Image 14"/></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="row">
                            <div class="preffix_1 grid_10">
                                <ul class="list_3">
                                    <li><a href="#"><img src="images/index-1_img09.jpg" alt="Image 9"/></a></li>
                                    <li><a href="#"><img src="images/index-1_img10.jpg" alt="Image 10"/></a></li>
                                    <li><a href="#"><img src="images/index-1_img11.jpg" alt="Image 11"/></a></li>
                                    <li><a href="#"><img src="images/index-1_img12.jpg" alt="Image 12"/></a></li>
                                    <li><a href="#"><img src="images/index-1_img13.jpg" alt="Image 13"/></a></li>
                                    <li><a href="#"><img src="images/index-1_img14.jpg" alt="Image 14"/></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<!-- ================================ OUR CLIENTS (END) =========================== -->

@stop