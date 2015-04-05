

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



    <!--[if lt IE 9]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
            <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0"
                 height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a>
    </div>
    <script src="js/html5shiv.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
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
    <link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
    <![endif]-->
    <!-- About Page End -->
    
</head>
<body>
    
<div class="page">
<!--========================================================
                          HEADER
=========================================================-->
<header id="header">
    <div id="stuck_container">
        <div class="container">
            <div class="row">
                <div class="grid_12">
                    <div class="brand put-left">
                        <h1>
                            <a href="/">
                                <img src="/images/logo_new1.jpg" alt="Logo"/>
                            </a>
                        </h1>
                    </div>

                    <nav class="nav put-right">
                        <ul class="sf-menu">
                            <li @yield('current_home')><a href="/">Home</a></li>
                             <li @yield('current_login')><a href="/login">Login</a></li>
                             <li @yield('current_services')><a href="services">Services</a></li>
                            <li @yield('current_about')>
                                <a href="about">About</a>
                                <!-- <ul>
                                    <li><a href="#">Lorem ipsum</a></li>
                                    <li><a href="#">Dolor sit amet</a>
                                    <li><a href="#">Ctetur adipisicing</a>
                                    <li><a href="#">Elit sed do</a>
                                        <ul>
                                            <li><a href="#">Iusmod tempor</a></li>
                                            <li><a href="#">Incididunt ut labore</a></li>
                                            <li><a href="#">Et dolore magna</a></li>
                                            <li><a href="#">Aliqua Ut enim</a></li>
                                            <li><a href="#">Minim veniam</a></li>
                                        </ul>
                                    </li>
                                </ul> -->
                            </li>
                            <li @yield('current_contacts')><a href="contacts">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

<!--========================================================
                          CONTENT
=========================================================-->
    @yield('content')




<!--========================================================
                          FOOTER
=========================================================-->
@include('partials.footer')

</body>
</html>