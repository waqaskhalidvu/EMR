@extends('public_layouts.master')

<!--========================================================
                          TITLE
=========================================================-->
@section('title')
Contacts
@stop

<!--========================================================
                          CURRENT MENU
=========================================================-->
@section("current_contacts")
class="current"
@stop

<!--========================================================
                          CONTENT
=========================================================-->
@section('content')
    <section id="content">
        <div class="container">
            <div class="row wrap_11">
                <div class="grid_12">
                    <h2 class="header_2 indent_4">Find Us</h2>
                </div>
            </div>
        </div>
        <div class="bg_1 wrap_17 wrap_19">
            <div class="container">
                <div class="row">
                    <div class="grid_12">
                        <iframe class="map"
                                src="https://www.google.com/maps/embed/v1/place?q=virtual+university+Lawrence+Road&key=AIzaSyBZCFjtU6e-CWFyg_EIVB5IxxsmEYAI5Jo"
                                style="border:0">
                        </iframe>
                    </div>
                </div>
                <div class="row">
                    <div class="grid_6">
                        <div class="wrap_18">
                            <h2 class="header_2 indent_5">
                                Contact Info
                            </h2>
                            <address>
                                <p class="text_7 color_6">
                                    We appreciate your experience with our application <br/>
                                    and will continue to improve it as you like.

                                </p>
                                <p class="text_8">
                                    If you have any queries Please Contact on followings:
                                </br>
                                    Electronic Medical Records. <br/>
                                    Lahore Pakistan, <br/>
                                    Telephone: +92 334 4050495 <br/>

                                    E-mail: <a href="#">emronline1@gmail.com</a>
                                </p>
                            </address>
                        </div>
                    </div>
                    <div class="grid_6">
                        <div class="wrap_18">
                            <h2 class="header_2 indent_2">
                                Contact Form
                            </h2>
                            <form id="contact-form">
                                <div class="contact-form-loader"></div>
                                <fieldset>
                                    <div class="row">
                                        <div class="grid_2">
                                            <label class="name">
                                                <input id="name" type="text" required="true" name="name" placeholder="*Name:" />
                                            </label>
                                        </div>
                                        <div class="grid_2">
                                            <label class="email">
                                                <input id="email" type="text" required="true" name="email" placeholder="*E-mail:" />
                                            </label>
                                        </div>
                                        <div class="grid_2">
                                            <label class="phone">
                                                <input id='phone' type="text" name="phone" placeholder="Phone:" />
                                            </label>
                                        </div>
                                    </div>
                                    <label class="message">
                                        <textarea id="message" name="message" required="true" placeholder="*Message:"></textarea>
                                    </label>
                                    <div>
                                        <p id="success_message" style="color: green"></p>
                                    </div>
                                    <br/>
                                    <div class="btn-wrap">
                                        <a class="btn_3" href="#" data-type="reset">clear</a>
                                        <input class="data_table_submit_btn" type="submit" value="send">
                                    </div>
                                </fieldset>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
@stop

@section('scripts')
    <script>
        $('#contact-form').submit(function(){
            var name = $('#name').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var message = $('#message').val();

            $.ajax({
                url: "contact/messages",
                type: 'post',
                data: {name: name, email: email, phone: phone, message: message},
                success: function(response){
                    console.log(response);
                    $('#name').val("");
                    $('#email').val("");
                    $('#phone').val("");
                    $('#message').val("");
                    $('#success_message').text(response);
                }
            });
        });


    </script>
@stop