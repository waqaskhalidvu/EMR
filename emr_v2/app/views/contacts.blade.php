@extends('public_layouts.public')

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
                                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d24214.807650104907!2d-73.94846048422478!3d40.65521573400813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1395650655094"
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
                                    Lorem ipsum dolor sit amet, consecteturpiscinger elit <br/>
                                    um dolor sit amet, consecteturpiscing.
                                </p>
                                <p class="text_8">
                                    Our <a href="http://www.templatemonster.com/" rel="nofollow">premium website templates</a> go with 24/7 support. <br/>
                                    <br/>
                                    If you have any questions about customization of free themes, address <br/>
                                    to guys from <a href="http://www.templatetuning.com/" rel="nofollow">TemplateTuning</a>. Note that it's a paid service. <br/>
                                    <br/>
                                    The Company Name Inc. <br/>
                                    9870 St Vincent Place, <br/>
                                    Glasgow, DC 45 Fr 45. <br/>
                                    Telephone: +1 800 603 6035 <br/>
                                    FAX: +1 800 889 9898 <br/>
                                    E-mail: <a href="#">mail@demolink.org</a>
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