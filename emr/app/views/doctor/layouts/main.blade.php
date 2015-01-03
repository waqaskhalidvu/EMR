<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="images/icon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact-form.css"/>
	<link rel="stylesheet" href="css/windows_menu.css">
	<link rel="stylesheet" href="css/dashboard.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>
    <script src="js/jquery.equalheights.js"></script>
    <script src='js/modal.js'></script>
    <script src='js/TMForm.js'></script>
    <script src="js/windows_tiles.js"></script>

    <!-- Data Table files -->
    <script src='js/jquery.dataTables.js'></script>  
    <link rel="stylesheet" href="css/jquery.dataTables.css">  
    <script type="text/javascript">
        $(document).ready(function() {
        $('#example').dataTable();
        } );
    </script>
    <!--------- End of Data Table files ------->


    
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
                                <a href="doctor_home">
                                    <img src="images/logo_new1.jpg" alt="Logo"/>
                                </a>
                            </h1>
                        </div>
                        <nav class="nav put-right">
                            <ul class="sf-menu">
                                <li @yield('current_doc_home')><a href="doctor_home">Home</a></li>
                                <li><a href="about">About</a></li>
                                <li><a href="services">Services</a></li>
                                <li><a href="contacts">Contacts</a></li>
                                <li><a href="index">Logout</a></li>
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


    </div>

<!--========================================================
                          FOOTER
=========================================================-->
<footer id="footer" class="color_9">
    <div class="container">
        <div class="row">
            <div class="grid_12">
                <p class="info text_4 color_4">
                    © <span id="copyright-year"></span> | <a href="#">Electronic Medical Records</a> <br/>
                    Website designed by <a href="" rel="nofollow">EMR Team - VU Software House</a>
                </p>
            </div>
        </div>
    </div>
</footer>

<script src="js/script.js"></script>
</body>
</html>