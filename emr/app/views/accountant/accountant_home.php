<!DOCTYPE html>
<html lang="en">
<head>
    <title>Accountant Home</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>
    <link rel="icon" href="images/icon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/grid.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact-form.css"/>
	<link rel="stylesheet" href="login_css/style.css"/>
	<link rel="stylesheet" href="css/windows_menu.css">
    <script src="js/jquery.js"></script>
    <script src="js/jquery-migrate-1.2.1.js"></script>
    <script src="js/jquery.equalheights.js"></script>
    <script src='js/modal.js'></script>
    <script src='js/TMForm.js'></script>
	<script> 
	$(document).ready(function() {
              $('.menu a').hover(function() {
                $(this).stop().animate({
                   opacity: 1
                 }, 200);
                    }, function() {
               $(this).stop().animate({
                opacity: 0.7
                 }, 200);
              });
            });
	</script>
	
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
                                <a href="accountant_home">
                                    <img src="images/logo_new1.jpg" alt="Logo"/>
                                </a>
                            </h1>
                        </div>
                        <nav class="nav put-right">
                            <ul class="sf-menu">
                                <li class="current"><a href="accountant_home">Home</a></li>
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
	<br>
    <section id="content">
        
		<div class = "user_logo">
			<div class="header_1 wrap_3 color_3" style="color: #fff; padding-top: 20px">
                        Accountant Home
            </div>
		</div>
		
			<div>
				<div class="menu" style="margin-left: 10%; margin-right: 10%">
					<a class="ferozi" href="#">Add Checkup Fee</a>
					<a class="green" href="#">Edit Checkup Fee</a>
					<a class="pink" href="#">View Checkup Fee</a>
					<a class="purple" href="#">Print Checkup Invoice</a>
					<a class="blue" href="#">Add Lab Test Fee</a>
					<a class="orange" href="#">Edit Lab Test Fee</a>
					<a class="ferozi" href="#">View Lab Test Fee</a>
					<a class="green" href="#">Print Test Invoice</a>	
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