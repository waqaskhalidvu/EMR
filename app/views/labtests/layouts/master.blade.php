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
    {{ HTML::style('/css/pagination.css') }}

  
<!--========================================================
                          JS
=========================================================-->

    {{ HTML::script('js/user_validation.js') }}
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
    {{ HTML::script('js/modernizr.js') }}

        <!-- Data Table files -->

        {{ HTML::script('js/jquery.dataTables.js') }}
        {{ HTML::style('/css/jquery.dataTables.css') }}

        <script type="text/javascript">
            $(document).ready(function() {
            $('#example').dataTable();
            } );

            function back () {
                window.history.back();
            }

            function printDiv() {
                var printContents = $("#printTable").html();
                w=window.open();
                w.document.write(printContents);
                w.print();
                w.close();
            }
        </script>
        <!--------- End of Data Table files ------->

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