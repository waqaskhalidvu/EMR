<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="/images/icon.jpg" type="image/x-icon">

    {{ HTML::style('/login_css/style.css') }}
    {{ HTML::style('/css/windows_menu.css') }}
    {{ HTML::style('/css/user_reg_form.css') }}
    {{ HTML::style('/css/grid.css') }}
    {{ HTML::style('/css/style.css') }}
    {{ HTML::style('css/breadcrumbs.css') }}
    {{ HTML::style('/css/isotope.css') }}
    {{ HTML::style('/css/contact-form.css') }}
    {{ HTML::style('/login_css/style.css') }}
    {{ HTML::style('/css/camera.css') }}
    {{ HTML::style('/css/owl.carousel.css') }}
    {{ HTML::style('/css/timepicki.css') }}
    {{ HTML::style('/css/pagination.css') }}

<!--========================================================
                          JS
=========================================================-->
    
    {{ HTML::script('js/jquery.js') }}
    {{ HTML::script('js/jquery-migrate-1.2.1.js') }}
    {{ HTML::script('js/jquery.equalheights.js') }}
    {{ HTML::script('js/isotope.min.js') }}
    {{ HTML::script('js/modal.js') }}
    {{ HTML::script('js/TMForm.js') }}
    {{ HTML::script('js/jquery.mobile.customized.min.js') }}
    {{ HTML::script('js/camera.js') }}
    {{ HTML::script('js/owl.carousel.js') }}

    {{ HTML::script('js/jquery.cookie.js') }}
    {{ HTML::script('js/device.min.js') }}
    {{ HTML::script('js/tmstickup.js') }}
    {{ HTML::script('js/jquery.easing.1.3.js') }}
    {{ HTML::script('js/jquery.ui.totop.js') }}
    {{ HTML::script('js/jquery.mousewheel.min.js') }}
    {{ HTML::script('js/jquery.simplr.smoothscroll.min.js') }}
    {{ HTML::script('js/superfish.js') }}
    {{ HTML::script('js/jquery.mobilemenu.js') }}
    {{ HTML::script('js/jquery.unveil.js') }}
    {{ HTML::script('js/script.js') }}
    {{ HTML::script('js/timepicki.js') }}
    {{ HTML::script('js/modernizr.js') }}

    <!-- Data Table files -->
    {{ HTML::script('js/jquery.dataTables.js') }}
    {{ HTML::style('/css/jquery.dataTables.css') }}

    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').dataTable();
            $('.timepicker').timepicki({
                increase_direction:'up',
                show_meridian:false,
                start_time: ["08", "00"],
                min_hour_value:0,
                max_hour_value:24
            });

            $('#regForm').submit(function(e){
               if($("#sunday").is(':checked') || $("#monday").is(':checked') || $("#tuesday").is(':checked') || $("#wednesday").is(':checked') || $("#thursday").is(':checked') || $("#friday").is(':checked') || $("#saturday").is(':checked')){
                    if($("#sunday").is(':checked')){
                        if($("#sun_start_time").val() == ''){
                            $('#sun_start_time').prop('required',true);
                            e.preventDefault();
                        }

                        if($("#sun_end_time").val() == ''){
                            $('#sun_end_time').prop('required',true);
                            e.preventDefault();
                        }
                    }

                    if($("#monday").is(':checked')){
                       if($("#mon_start_time").val() == ''){
                           $('#mon_start_time').prop('required',true);
                           e.preventDefault();
                       }

                       if($("#mon_end_time").val() == ''){
                           $('#mon_end_time').prop('required',true);
                           e.preventDefault();
                       }
                    }

                    if($("#tuesday").is(':checked')){
                       if($("#tue_start_time").val() == ''){
                            $('#tue_start_time').prop('required',true);
                            e.preventDefault();
                       }

                       if($("#tue_end_time").val() == ''){
                            $('#tue_end_time').prop('required',true);
                            e.preventDefault();
                       }
                    }

                    if($("#wednesday").is(':checked')){
                       if($("#wed_start_time").val() == ''){
                           $('#wed_start_time').prop('required',true);
                           e.preventDefault();
                       }

                      if($("#wed_end_time").val() == ''){
                           $('#wed_end_time').prop('required',true);
                           e.preventDefault();
                      }
                    }

                    if($("#thursday").is(':checked')){
                       if($("#thu_start_time").val() == ''){
                          $('#thu_start_time').prop('required',true);
                          e.preventDefault();
                       }

                       if($("#thu_end_time").val() == ''){
                          $('#thu_end_time').prop('required',true);
                          e.preventDefault();
                       }
                    }

                    if($("#friday").is(':checked')){
                       if($("#fri_start_time").val() == ''){
                         $('#fri_start_time').prop('required',true);
                         e.preventDefault();
                       }

                       if($("#fri_end_time").val() == ''){
                         $('#fri_end_time').prop('required',true);
                         e.preventDefault();
                       }
                    }

                    if($("#saturday").is(':checked')){
                      if($("#sat_start_time").val() == ''){
                           $('#sat_start_time').prop('required',true);
                           e.preventDefault();
                      }

                      if($("#sat_end_time").val() == ''){
                           $('#sat_end_time').prop('required',true);
                           e.preventDefault();
                      }
                    }
               }else{
                   alert('Please Select at least one day!')
                   e.preventDefault();
               }

            });
        } );
    </script>

 
       

    <!--------------------- VIEW USER tr CSS -------------------->

    <!--[if lt IE 9]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
            <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0"
                 height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a>
    </div>
    <script src="js/html5shiv.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="/css/ie.css">
    <![endif]-->

    <!-- About Page -->
    <!--[if lt IE 9]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
            <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0"
                 height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a>
    </div>
    <script src="js/html5shiv.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="/css/ie.css">
    <![endif]-->
    <!-- About Page End -->

</head>
<body>

<div class="page">

    <!--========================================================
                                  HEADER
    =========================================================-->
        @include('partials.header')

<!--========================================================
                          CONTENT-1
=========================================================-->
    @yield('content1')


<!--========================================================
                          CONTENT-2
=========================================================-->
    @yield('content2')

<!--========================================================
                          FOOTER
=========================================================-->
@include('partials.footer')


</body>
</html>