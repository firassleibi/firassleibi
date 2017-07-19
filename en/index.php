<?php

if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$message=$_POST['message'];
	$subject=$_POST['subject'];
	
	$msg="name: ".$name."\n";
	$msg.="subject: ".$subject."\n";
	$msg.="email: ".$email."\n";
	$msg.="message: ".$message."\n";
	mail("firassleibi@gmail.com","Firas Sleibi - Contact page",$msg);
}
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>

        <!-- Site Title -->
        <title>Firas Sleibi - Software Engineer</title>

        <!-- Site Meta Info -->
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Firas Sleibi - Software Engineer, Web and App developer, High quality development, cheap prices, Hire now and make your digital dreams come true!">
        <meta name="keywords" content="firas sleibi,firas,sleibi,web developer,android developer,developer,hosting,html5,php,mysql,css,css3,html,ajax,jquery,software, software engineer">
        <meta name="author" content="Firas Sleibi">

		<link rel="alternate" href="http://en.firassleibi.com/" hreflang="en" />
        <link rel="alternate" href="http://ar.firassleibi.com/" hreflang="ar" />
        <!-- Essential CSS Files -->
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/animate.css">
        <link rel="stylesheet" href="css/simplelightbox.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.css">
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css"/>
        <!-- Color Styles | To Chage the color simply remove all the stylesheet form bellow without the color you want to keep -->
        <!--link rel="stylesheet" href="css/colors/color-green.css"-->
        <link rel="stylesheet" href="css/colors/color-blue.css">
        <!--link rel="stylesheet" href="css/colors/color-aqua.css"-->
        <!--link rel="stylesheet" href="css/colors/color-purple.css"-->
        <!--link rel="stylesheet" href="css/colors/default-color.css"-->

        <!-- Responsive CSS -->
        <link rel="stylesheet" href="css/responsive.css">

        <!-- Google Web Fonts =:= Raleway , Montserrat and Roboto -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:700,400" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:700,500,400" rel="stylesheet" type="text/css">

        <!-- Essential JS Files -->
        <script src="js/vendor/jquery-1.11.3.min.js"></script>
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>

        <!-- IE9 Scripts -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-76354828-1', 'auto');
  ga('send', 'pageview');

</script>

    </head>
    <body>

    <!-- Heaser Area Start -->
    <header class="header-area">
        <!-- Navigation start -->
        <nav class="navbar navbar-custom tb-nav" role="navigation">
            <div class="container">        
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#tb-nav-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand logo" href="#"><h2>Firas<span>Sleibi</span></h2></a>
              </div>
          
              <div class="collapse navbar-collapse" id="tb-nav-collapse">
          
                <ul class="nav navbar-nav navbar-right">
                
                    <li class="active"><a class="page-scroll" href="#top">Home</a></li>
                    <li><a class="page-scroll" href="#about">About me</a></li>
                    <li><a class="page-scroll" href="#portfolio">Portfolio</a></li>
                    <li><a class="page-scroll" href="#contact">Hire me!</a></li>
                    <li><a class="page-lang" href="http://ar.firassleibi.com">عربي</a></li>
                    
                </ul>
              </div>
            </div>
        </nav>
    </header>
        <!-- Navigation end -->

        <!-- hero-section -->
        <section class="hero-section static-bg" id="top">
                <div class="slider-caption">
                    <div class="container">
                        <div class="row">
                            <!-- Hero Title -->
                            <h1>welcome to <span>My Portfolio</span></h1>
                            <!-- Hero Subtitle -->
                            <h5>I think + I advise + I design + I develop</h5>
                        </div>
                    </div>
                </div>
        </section>
        <!-- End Of Hero Section -->

        <!-- About Us Section -->
        
        <section class="about-us" id="about">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 col-xs-12 no-padding">
                        <!-- About Us Left -->
                        <div class="about-us-left">
                            <!-- About Us Info -->
                            <h2 class="section-title-left">About Me</h2>
                            <p> My name is Firas Sleibi, I am a Senior Software Engineer, raised in Aleppo - Syria, Live and work in Dubai - UAE.<br/>Developing and Creating is not my job, It is actually what I do when I want to have fun!<br/>
                            Started my passion in Technology since I was only 13 years old, developed myself day by day, Everyday learning new experience and being more creative.<br/>I have a Bachelor Degree in Information & Communication Technology Engineering. <br/>To know more about my study, work and career please feel free to download my Resume from the link below!
                            </p>
                            <!-- Portfolio Gallery Button -->
                    <div class="portfolio-button text-center mt-50" style="margin-top:25px">
                        <a href="http://firassleibi.com/firassleibi.pdf" target="_blank"><button class="btn btn-primary portfolio-btn">My Resume</button></a>
                     <!--button onClick="openQR()" class="btn btn-primary portfolio-btn">My Resume</button-->   
                     <div id="code"></div>
                    </div>
                            
                        </div>
                        
                    </div>
                    <div class="col-sm-6 col-xs-12 no-padding">
                        <!-- About Us Right -->
                        <div class="about-us-right">
                            <!-- Our Features -->
                            <div class="media">
                                <div class="media-left dotted">
                                    <i class="fa fa-lightbulb-o"></i>
                                </div>
                                <div class="media-body">
                                    <!-- About Right Title -->
                                    <h3 class="media-heading">I advise and analyse</h3>
                                    <p>I provide advise and analyse and think of the best solutions for your projects, to make it more efficient, simple and special!</p>
                                </div>
                            </div>
                            <!-- Our Features -->
                            <div class="media">
                                <div class="media-left dotted">
                                    <i class="fa fa-pencil-square-o"></i>
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading">I Design</h3>
                                    <p>I provide modern designs using latest design strategies and provide  unique attractive design </p>
                                </div>
                            </div>
                            <!-- Our Features -->
                            <div class="media">
                                <div class="media-left">
                                    <i class="fa fa-code"></i>
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading">I develop</h3>
                                    <p>I develop responsive HTML5 websites (Ecommerce - Wordpress - Costumized - Static - VB .. ECT),Mobile Applications and PC softwares, using latest frameworks, clean file structure and code is my priority! </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- End Of About Us Section -->

        <!-- Our Services -->

        <section class="our-services-section section-padding" id="service">
            <div class="container">
                <!-- Our service Section Title -->
                <h2 class="section-title text-center">What I do</h2>
                <!-- Our service  Section Subtitle -->
                <p class="sub-title text-center">I help you develop projects from scratch, give me the idea and I'll work to make it true.</p>

                <div class="row our-services">

                    <!-- Single Service -->
                    <div class="col-md-6 col-lg-5 col-sm-12 col-lg-offset-1 col-xs-12 single-service">
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-laptop"></i>
                            </div>
                            <div class="media-body">
                                <!-- Single service title -->
                                <h3 class="media-heading">Website Development</h3>
                                <p>Simple website to complicated websites. Static - Dynamic - Ecommerce - Wordpress - VB - Joomla and more.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Single Service -->
                    <div class="col-md-6 col-lg-5 col-sm-12 col-xs-12 single-service">
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-mobile"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">Android/IOS Applications</h3>
                                <p>Developmont of Android mobile applications from simple to complicated, Manage replication process to IOS with my IOS team. </p>
                            </div>
                        </div>
                    </div>

                    <!-- Single Service -->
                    <div class="col-md-6 col-lg-5 col-sm-12 col-xs-12 col-lg-offset-1 single-service">
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-binoculars"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">Hosting & Server Management</h3>
                                <p>Provide reliable hosting solutions, manage and backup your website files, mails and database.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Single Service -->
                    <div class="col-md-6 col-lg-5 col-sm-12 col-xs-12 single-service">
                        <div class="media">
                            <div class="media-left">
                                <i class="fa fa-code"></i>
                            </div>
                            <div class="media-body">
                                <h3 class="media-heading">Troubleshooting & Security</h3>
                                <p>Fix bugs in your softwares , servers and platforms. Find and close all vulnerables on your platform.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- End Of Our Services -->



        <!-- Portfolio Section Starts Here -->
        <section class="protfolio-section section-padding" id="portfolio">
            <div class="container-fluid">
                <!-- Portfolio Section Title -->
                <h2 class="section-title text-center">Portfolio</h2>
                <p class="sub-title text-center">Sample of some projects I developed!</p>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 text-center portfolio-filter mt-30 mb-30">
                        <!-- Portfolio Filter Navigation -->
                        <div class="portfolio-filter-nav btn-group">
                            <ul id="filter" class="nav">
                                <li class="active" data-group="all">All</li>
                                <li data-group="web">Websites</li>
                                <li data-group="wp">Wordpress</li>
                                <li data-group="ecom">E-commerce</li>
                                <li data-group="app">Applications</li>
                            </ul>
                        </div>
                    </div>

                    <!-- Portfolio Showcase -->
                    <div class="portfolio-showcase">
                        <!-- Showcase Grid -->
                        <div id="grid" class="clearfix">
                            <!-- Single Portfolio Item -->
                            <div class="thumbnails" data-groups='["all", "web"]'>
                                <a href="http://www.sdanah.com" target="_blank">
                                    <img src="img/portfolio/portfolio/1.png" alt="">
                                    <span class="portfolio-overlay">
                                        <i class="fa fa-link"></i>
                                    </span>
                                </a>
                            </div>
                            <!-- Single Portfolio Item -->
                            <div class="thumbnails" data-groups='["all","web", "wp"]'>
                                <a href="http://www.chamhorizon.com" target="_blank">
                                    <img src="img/portfolio/portfolio/2.png" alt="">
                                    <span class="portfolio-overlay">
                                        <i class="fa fa-link"></i>
                                    </span>
                                </a>
                            </div>
                            <!-- Single Portfolio Item -->
                            <div class="thumbnails" data-groups='["all","web"]'>
                                <a href="http://www.modernarea.net" target="_blank">
                                    <img src="img/portfolio/portfolio/3.jpg" alt="">
                                    <span class="portfolio-overlay">
                                        <i class="fa fa-link"></i>
                                    </span>
                                </a>
                            </div>
                            <!-- Single Portfolio Item -->
                            <div class="thumbnails" data-groups='["all","web"]'>
                                <a href="http://www.legend-ae.com" target="_blank">
                                    <img src="img/portfolio/portfolio/4.png" alt="">
                                    <span class="portfolio-overlay">
                                        <i class="fa fa-link"></i>
                                    </span>
                                </a>
                            </div>
                            <!-- Single Portfolio Item -->
                            <div class="thumbnails" data-groups='["all","web"]'>
                                <a href="http://fahadcrm.byethost7.com/watani/" target="_blank">
                                    <img src="img/portfolio/portfolio/5.jpg" alt="">
                                    <span class="portfolio-overlay">
                                        <i class="fa fa-link"></i>
                                    </span>
                                </a>
                            </div>
                            <!-- Single Portfolio Item -->
                            <div class="thumbnails" data-groups='["all","web","ecom"]'>
                                <a href="http://fiestalines.com" target="_blank">
                                    <img src="img/portfolio/portfolio/6.jpg" alt="">
                                    <span class="portfolio-overlay">
                                        <i class="fa fa-link"></i>
                                    </span>
                                </a>
                            </div>
                            <!-- Single Portfolio Item -->
                            <div class="thumbnails" data-groups='["all","web","wp"]'>
                                <a href="http://5plsolutions.com" target="_blank">
                                    <img src="img/portfolio/portfolio/7.png" alt="">
                                    <span class="portfolio-overlay">
                                        <i class="fa fa-link"></i>
                                    </span>
                                </a>
                            </div>
                            <!-- Single Portfolio Item -->
                            <div class="thumbnails" data-groups='["all","web","wp"]'>
                                <a href="img/portfolio/portfolio/8.png">
                                    <img src="img/portfolio/portfolio/8s.png" alt="">
                                    <span class="portfolio-overlay">
                                        <i class="fa fa-image"></i>
                                    </span>
                                </a>
                            </div>
                            <!-- Single Portfolio Item -->
                            <div class="thumbnails" data-groups='["all","app"]'>
                                <a href="img/portfolio/portfolio/9.png">
                                    <img src="img/portfolio/portfolio/9s.png" alt="">
                                    <span class="portfolio-overlay">
                                        <i class="fa fa-image"></i>
                                    </span>
                                </a>
                            </div>
                            <!-- Single Portfolio Item -->
                            <div class="thumbnails" data-groups='["all","app"]'>
                                <a href="img/portfolio/portfolio/10.png">
                                    <img src="img/portfolio/portfolio/10s.png" alt="">
                                    <span class="portfolio-overlay">
                                        <i class="fa fa-image"></i>
                                    </span>
                                </a>
                            </div>
                      
                
                            

                        </div>
                    </div>



                    
                </div>
            </div>
        </section>
        <!-- End of Portfolio Section Starts Here -->



 




        <!-- Contact Us Section -->

        <section class="contact-us-section section-padding" id="contact">
            <div class="container">
                <!-- Contact Us Section Title -->
                <h2 class="section-title contact-title text-center">Hire me!</h2>
                <p class="sub-title contact-subtitle text-center">Hire me now and let me provide you digital solutions for your projects!<br/>Feel free to contact me anytime, I will answer all your concerns!<br/> you can contact me using the form below or directly to my Email: <a style="color:#63C2FF" href="mailto:firassleibi@gmail.com">firassleibi@gmail.com</a></p>
                

                <div class="row">
                    <div class="col-md-10 col-md-offset-1 col-lg-10 col-lg-offset-1 col-sm-10 col-sm-offset-1 col-xs-12">
                    	<? if(isset($_POST['submit'])){?><p class="alert alert-success">Thank you! your message has been sent successfully, I will get back to you shortly.</p><? }?>
                        <div class="contact-form-section mt-50">
                            <form method="POST" id="contactForm" name="contact-form" role="form">
                                <div class="row">
                                    <div class="col-sm-5 col-md-4">
                                        <!-- Name Field -->
                                        <div class="form-group contact-form-icon">
                                          <label class="sr-only">Name</label>
                                          <i class="fa fa-user"></i>
                                          <input type="text" placeholder="Name" id="name" class="form-control" name="name" required>
                                        </div>
                                        <!-- Email Field -->
                                        <div class="form-group contact-form-icon">
                                          <label for="email" class="sr-only">Email</label>
                                          <i class="fa fa-envelope"></i>
                                          <input type="email" placeholder="Email" id="email" class="form-control" name="email" required>
                                        </div>
                                        <!-- Subject Field -->
                                        <div class="form-group contact-form-icon">
                                          <label for="subject" class="sr-only">Subject</label>
                                          <i class="fa fa-pencil"></i>
                                          <input type="text" placeholder="Subject" id="subject" class="form-control" name="subject" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-7 col-md-8">
                                        <div class="form-group contact-form-icon">
                                          <label for="message" class="sr-only">Message</label>
                                          <i class="fa fa-keyboard-o"></i>
                                          <textarea placeholder="Message" rows="7" id="message" class="form-control" name="message" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-5 col-md-4 text-center contact-button-padding">
                                        <button class="btn-primary btn-contact btn-block" name="submit" type="submit"><i class="fa fa-paper-plane"></i> Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- End Of Contact Us Section -->

        

        <!-- Google Map Section -->

        <section class="goolge-map-section">
             <!-- Toggle Button Area -->
            <div class="toggle-map-button">
                <button id="mapToggle" class="gmap-btn btn-block">Locate on google map<i class="fa fa-chevron-down"></i></button>                
            </div>
            <!-- Google Map -->
            <div class="google-map-container">
                <div class="google-map" id="gmap-wrapper"></div>
            </div>
        </section>

        <!-- End Of Google Map Section -->

        <!-- Footer Section -->

        <footer class="footer-section">
            <div class="container">
                <div class="row mt-30 mb-30">
                    <div class="col-md-12 text-center">
                        <!-- Footer Copy Right Text -->
                        <div class="copyright-info">
                            <span><i class="fa fa-code"></i></span> with <span><i class="fa fa-heart"></i></span> By <span>Firas Sleibi</span>
                        </div>

                        <!-- Footer Social Icons -->
                        <div class="social-icons mt-30">
                        
                            <a href="https://www.facebook.com/sleibi.firas" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.linkedin.com/in/firas-sleibi-453555100" target="_blank"><i class="fa fa-linkedin"></i></a>
                            <a href="https://twitter.com/firassleibi" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a href="https://plus.google.com/105543995539303035054" target="_blank"><i class="fa fa-google-plus"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- End Of Footer Section -->


        <!-- JS Files -->
        <!-- Bootstrap JS -->
        <script src="js/bootstrap.min.js"></script>
        <!-- jQuery Easing -->
        <script src="js/jquery.easing.min.js"></script>
        <!-- PreLoader -->
        <script src="js/queryloader2.min.js"></script>
        <!-- WOW JS Animation -->
        <script src="js/wow.min.js"></script>
        <!-- Simple Lightbox -->
        <script src="js/simple-lightbox.min.js"></script>
        <!-- Sticky -->
        <script src="js/jquery.sticky.js"></script>
        <!-- OWL-Carousel -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- jQuery inview -->
        <script src="js/jquery.inview.js"></script>
        <!-- Shuffle jQuery -->
        <script src="js/jquery.shuffle.min.js"></script>
        <!-- jQuery CountTo -->
        <script src="js/jquery.counTo.js"></script>
        <!-- Goole map API -->
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <!-- gmap.js plugin -->
        <script src="js/gmap.js"></script>
        <!-- Main JS -->
        <script src="js/main.js"></script>
        <script>
function openQR(){
            app.openQR();
}
function setCode(code){
	document.getElementById("code").innerHTML=code;
}
</script>

    </body>
</html>
