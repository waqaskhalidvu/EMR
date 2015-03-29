@extends('lab.layouts.master')

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
    <section id="content"><div class="ic">More Website Templates @ TemplateMonster.com - September08, 2014!</div>
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
                                    Telephone: +1 800 603 6035 <br/>
                                    FAX: +1 800 889 9898 <br/>
                                    E-mail: <a href="#">emr@gmail.com</a>
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
                                                <input type="text" name="name" placeholder="Name:" value=""
                                                       data-constraints="@Required @JustLetters"/>
                                                <span class="empty-message">*This field is required.</span>
                                                <span class="error-message">*This is not a valid name.</span>
                                            </label>
                                        </div>
                                        <div class="grid_2">
                                            <label class="email">
                                                <input type="text" name="email" placeholder="E-mail:" value=""
                                                       data-constraints="@Required @Email"/>
                                                <span class="empty-message">*This field is required.</span>
                                                <span class="error-message">*This is not a valid email.</span>
                                            </label>
                                        </div>
                                        <div class="grid_2">
                                            <label class="phone">
                                                <input type="text" name="phone" placeholder="Phone:" value=""
                                                       data-constraints="@JustNumbers"/>
                                                <span class="empty-message">*This field is required.</span>
                                                <span class="error-message">*This is not a valid phone.</span>
                                            </label>
                                        </div>
                                    </div>
                                    <label class="message">
                                        <textarea name="message" placeholder="Message:"
                                                  data-constraints='@Required @Length(min=20,max=999999)'></textarea>
                                        <span class="empty-message">*This field is required.</span>
                                        <span class="error-message">*The message is too short.</span>
                                    </label>
                                    <div class="btn-wrap">
                                        <a class="btn_3" href="#" data-type="reset">clear</a>
                                        <a class="btn_3" href="#" data-type="submit">send</a>
                                    </div>
                                </fieldset>
                                <div class="modal fade response-message">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">Modal title</h4>
                                            </div>
                                            <div class="modal-body">
                                                You message has been sent! We will be in touch soon.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
@stop